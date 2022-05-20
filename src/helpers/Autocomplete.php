<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2021 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\base\Element;
use craft\helpers\ArrayHelper;
use phpDocumentor\Reflection\DocBlockFactory;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
use ReflectionUnionType;
use yii\base\Behavior;
use yii\base\InvalidConfigException;
use yii\di\ServiceLocator;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.21
 */
class Autocomplete
{
    // Constants
    // =========================================================================

    const COMPLETION_KEY = '__completions';
    const EXCLUDED_PROPERTY_NAMES = [
        'controller',
        'Controller',
        'CraftEdition',
        'CraftSolo',
        'CraftPro',
    ];
    const EXCLUDED_BEHAVIOR_NAMES = [
        'fieldHandles',
        'hasMethods',
        'owner',
    ];
    const ELEMENT_ROUTE_EXCLUDES = [
        'matrixblock',
        'globalset'
    ];
    const EXCLUDED_PROPERTY_REGEXES = [
        '^_',
    ];
    const EXCLUDED_METHOD_REGEXES = [
        '^_',
    ];
    const RECURSION_DEPTH_LIMIT = 10;

    // Faux enum, from: https://microsoft.github.io/monaco-editor/api/enums/monaco.languages.completionitemkind.html
    const CompletionItemKind = [
        'Class' => 5,
        'Color' => 19,
        'Constant' => 14,
        'Constructor' => 2,
        'Customcolor' => 22,
        'Enum' => 15,
        'EnumMember' => 16,
        'Event' => 10,
        'Field' => 3,
        'File' => 20,
        'Folder' => 23,
        'Function' => 1,
        'Interface' => 7,
        'Issue' => 26,
        'Keyword' => 17,
        'Method' => 0,
        'Module' => 8,
        'Operator' => 11,
        'Property' => 9,
        'Reference' => 21,
        'Snippet' => 27,
        'Struct' => 6,
        'Text' => 18,
        'TypeParameter' => 24,
        'Unit' => 12,
        'User' => 25,
        'Value' => 13,
        'Variable' => 4,
    ];

    // Public Static Methods
    // =========================================================================

    /**
     * Core function that generates the autocomplete array
     * @param null $additionalCompletionsCacheKey
     * @return array
     */
    public static function generate($additionalCompletionsCacheKey = null): array
    {
        $completionList = [];
        // Iterate through the globals in the Twig context
        /* @noinspection PhpInternalEntityUsedInspection */
        $globals = array_merge(
            Craft::$app->view->getTwig()->getGlobals(),
            self::elementRouteVariables(),
            self::overrideValues()
        );
        foreach ($globals as $key => $value) {
            if (!in_array($key, self::EXCLUDED_PROPERTY_NAMES, true)) {
                $type = gettype($value);
                switch ($type) {
                    case 'object':
                        self::parseObject($completionList, $key, $value, 0);
                        break;

                    case 'array':
                    case 'boolean':
                    case 'double':
                    case 'integer':
                    case 'string':
                        $kind = self::CompletionItemKind['Variable'];
                        $path = $key;
                        $normalizedKey = preg_replace("/[^A-Za-z]/", '', $key);
                        if (ctype_upper($normalizedKey)) {
                            $kind = self::CompletionItemKind['Constant'];
                        }
                        ArrayHelper::setValue($completionList, $path, [
                            self::COMPLETION_KEY => [
                                'detail' => "$value",
                                'kind' => $kind,
                                'label' => $key,
                                'insertText' => $key,
                            ]
                        ]);
                        break;
                }
            }
        }
        // Add in additional completion items from the cache, if present
        if ($additionalCompletionsCacheKey) {
            $cache = Craft::$app->getCache();
            $additionalCompletions = $cache->get([self::class, $additionalCompletionsCacheKey]);
            if ($additionalCompletions !== false && is_array($additionalCompletions)) {
                $completionList = array_merge($completionList, $additionalCompletions);
            }

        }

        return $completionList;
    }

    /**
     * Parse the object passed in, including any properties or methods
     *
     * @param array $completionList
     * @param string $name
     * @param $object
     * @param int $recursionDepth
     * @param string $path
     */
    public static function parseObject(array &$completionList, string $name, $object, int $recursionDepth, string $path = '')
    {
        // Only recurse `RECURSION_DEPTH_LIMIT` deep
        if ($recursionDepth > self::RECURSION_DEPTH_LIMIT) {
            return;
        }
        $recursionDepth++;
        // Create the docblock factory
        $factory = DocBlockFactory::createInstance();

        $path = trim(implode('.', [$path, $name]), '.');
        // The class itself
        self::getClassCompletion($completionList, $object, $factory, $name, $path);
        // ServiceLocator Components
        self::getComponentCompletion($completionList, $object, $recursionDepth, $path);
        // Class properties
        self::getPropertyCompletion($completionList, $object, $factory, $recursionDepth, $path);
        // Class methods
        self::getMethodCompletion($completionList, $object, $factory, $path);
        // Behavior properties
        self::getBehaviorCompletion($completionList, $object, $factory, $recursionDepth, $path);
    }

    // Protected Static Methods
    // =========================================================================

    /**
     * @param array $completionList
     * @param $object
     * @param DocBlockFactory $factory
     * @param string $name
     * @param $path
     */
    protected static function getClassCompletion(array &$completionList, $object, DocBlockFactory $factory, string $name, $path)
    {
        try {
            $reflectionClass = new ReflectionClass($object);
        } catch (ReflectionException $e) {
            return;
        }
        // Information on the class itself
        $className = $reflectionClass->getName();
        $docs = $reflectionClass->getDocComment();
        if ($docs) {
            $docblock = $factory->create($docs);
            if ($docblock) {
                $summary = $docblock->getSummary();
                if (!empty($summary)) {
                    $docs = $summary;
                }
                $description = $docblock->getDescription()->render();
                if (!empty($description)) {
                    $docs = $description;
                }
            }
        }
        ArrayHelper::setValue($completionList, $path, [
            self::COMPLETION_KEY => [
                'detail' => "$className",
                'documentation' => $docs,
                'kind' => self::CompletionItemKind['Class'],
                'label' => $name,
                'insertText' => $name,
            ]
        ]);
    }

    /**
     * @param array $completionList
     * @param $object
     * @param $recursionDepth
     * @param $path
     */
    protected static function getComponentCompletion(array &$completionList, $object, $recursionDepth, $path)
    {
        if ($object instanceof ServiceLocator) {
            foreach ($object->getComponents() as $key => $value) {
                $componentObject = null;
                try {
                    $componentObject = $object->get($key);
                } catch (InvalidConfigException $e) {
                    // That's okay
                }
                if ($componentObject) {
                    self::parseObject($completionList, $key, $componentObject, $recursionDepth, $path);
                }
            }
        }
    }

    /**
     * @param array $completionList
     * @param $object
     * @param DocBlockFactory $factory
     * @param $recursionDepth
     * @param string $path
     */
    protected static function getPropertyCompletion(array &$completionList, $object, DocBlockFactory $factory, $recursionDepth, string $path)
    {
        try {
            $reflectionClass = new ReflectionClass($object);
        } catch (ReflectionException $e) {
            return;
        }
        $reflectionProperties = $reflectionClass->getProperties();
        $customField = false;
        if ($object instanceof Behavior) {
            $customField = true;
        }
        $sortPrefix = $customField ? '~' : '~~';
        foreach ($reflectionProperties as $reflectionProperty) {
            $propertyName = $reflectionProperty->getName();
            // Exclude some properties
            $propertyAllowed = true;
            foreach (self::EXCLUDED_PROPERTY_REGEXES as $excludePattern) {
                $pattern = '`' . $excludePattern . '`i';
                if (preg_match($pattern, $propertyName) === 1) {
                    $propertyAllowed = false;
                }
            }
            if (in_array($propertyName, self::EXCLUDED_PROPERTY_NAMES, true)) {
                $propertyAllowed = false;
            }
            if ($customField && in_array($propertyName, self::EXCLUDED_BEHAVIOR_NAMES, true)) {
                $propertyAllowed = false;
            }
            // Process the property
            if ($propertyAllowed && $reflectionProperty->isPublic()) {
                $detail = "Property";
                $docblock = null;
                $docs = $reflectionProperty->getDocComment();
                if ($docs) {
                    $docblock = $factory->create($docs);
                    $docs = '';
                    if ($docblock) {
                        $summary = $docblock->getSummary();
                        if (!empty($summary)) {
                            $docs = $summary;
                        }
                        $description = $docblock->getDescription()->render();
                        if (!empty($description)) {
                            $docs = $description;
                        }
                    }
                }
                // Figure out the type
                if ($docblock) {
                    $tag = $docblock->getTagsByName('var');
                    if ($tag && isset($tag[0])) {
                        $detail = strval($tag[0]);
                    }
                }
                if ($detail === "Property") {
                    if (preg_match('/@var\s+([^\s]+)/', $docs, $matches)) {
                        list(, $type) = $matches;
                        $detail = $type;
                    } else {
                        $detail = "Property";
                    }
                }
                if ($detail === "Property") {
                    if ((PHP_MAJOR_VERSION >= 7 && PHP_MINOR_VERSION >= 4) || (PHP_MAJOR_VERSION >= 8)) {
                        if ($reflectionProperty->hasType()) {
                            $reflectionType = $reflectionProperty->getType();
                            if ($reflectionType instanceof ReflectionNamedType) {
                                $type = $reflectionType->getName();
                                $detail = $type;
                            }
                        }
                        if (PHP_MAJOR_VERSION >= 8) {
                            if ($reflectionProperty->hasDefaultValue()) {
                                $value = $reflectionProperty->getDefaultValue();
                                if (is_array($value)) {
                                    $value = json_encode($value);
                                }
                                if (!empty($value)) {
                                    $detail = "$value";
                                }
                            }
                        }
                    }
                }
                $thisPath = trim(implode('.', [$path, $propertyName]), '.');
                $label = $propertyName;
                ArrayHelper::setValue($completionList, $thisPath, [
                    self::COMPLETION_KEY => [
                        'detail' => $detail,
                        'documentation' => $docs,
                        'kind' => $customField ? self::CompletionItemKind['Field'] : self::CompletionItemKind['Property'],
                        'label' => $label,
                        'insertText' => $label,
                        'sortText' => $sortPrefix . $label,
                    ]
                ]);
                // Recurse through if this is an object
                if (isset($object->$propertyName) && is_object($object->$propertyName)) {
                    if (!$customField && !in_array($propertyName, self::EXCLUDED_PROPERTY_NAMES, true)) {
                        self::parseObject($completionList, $propertyName, $object->$propertyName, $recursionDepth, $path);
                    }
                }
            }
        }
    }

    /**
     * @param array $completionList
     * @param $object
     * @param DocBlockFactory $factory
     * @param string $path
     */
    protected static function getMethodCompletion(array &$completionList, $object, DocBlockFactory $factory, string $path)
    {
        try {
            $reflectionClass = new ReflectionClass($object);
        } catch (ReflectionException $e) {
            return;
        }
        $reflectionMethods = $reflectionClass->getMethods();
        foreach ($reflectionMethods as $reflectionMethod) {
            $methodName = $reflectionMethod->getName();
            // Exclude some properties
            $methodAllowed = true;
            foreach (self::EXCLUDED_METHOD_REGEXES as $excludePattern) {
                $pattern = '`' . $excludePattern . '`i';
                if (preg_match($pattern, $methodName) === 1) {
                    $methodAllowed = false;
                }
            }
            // Process the method
            if ($methodAllowed && $reflectionMethod->isPublic()) {
                $docblock = null;
                $docs = $reflectionMethod->getDocComment();
                if ($docs) {
                    $docblock = $factory->create($docs);
                    if ($docblock) {
                        $summary = $docblock->getSummary();
                        if (!empty($summary)) {
                            $docs = $summary;
                        }
                        $description = $docblock->getDescription()->render();
                        if (!empty($description)) {
                            $docs = $description;
                        }
                    }
                }
                $detail = $methodName . '(';
                $params = $reflectionMethod->getParameters();
                $paramList = [];
                foreach ($params as $param) {
                    if ($param->hasType()) {
                        $reflectionType = $param->getType();
                        if ($reflectionType instanceof ReflectionUnionType) {
                            $unionTypes = $reflectionType->getTypes();
                            $typeName = '';
                            foreach ($unionTypes as $unionType) {
                                $typeName .= '|' . $unionType->getName();
                            }
                            $typeName = trim($typeName, '|');
                            $paramList[] = $typeName . ': ' . '$' . $param->getName();
                        } else {
                            $paramList[] = $param->getType()->getName() . ': ' . '$' . $param->getName();
                        }
                    } else {
                        $paramList[] = '$' . $param->getName();
                    }
                }
                $detail .= implode(', ', $paramList) . ')';
                $thisPath = trim(implode('.', [$path, $methodName]), '.');
                $label = $methodName . '()';
                $docsPreamble = '';
                // Figure out the type
                if ($docblock) {
                    $tags = $docblock->getTagsByName('param');
                    if ($tags) {
                        $docsPreamble = "Parameters:\n\n";
                        foreach ($tags as $tag) {
                            $docsPreamble .= $tag . "\n";
                        }
                        $docsPreamble .= "\n";
                    }
                }
                ArrayHelper::setValue($completionList, $thisPath, [
                    self::COMPLETION_KEY => [
                        'detail' => $detail,
                        'documentation' => $docsPreamble . $docs,
                        'kind' => self::CompletionItemKind['Method'],
                        'label' => $label,
                        'insertText' => $label,
                        'sortText' => '~~~' . $label,
                    ]
                ]);
            }
        }
    }

    /**
     * @param array $completionList
     * @param $object
     * @param DocBlockFactory $factory
     * @param $recursionDepth
     * @param string $path
     */
    protected static function getBehaviorCompletion(array &$completionList, $object, DocBlockFactory $factory, $recursionDepth, string $path)
    {
        if ($object instanceof Element) {
            $behaviorClass = $object->getBehavior('customFields');
            if ($behaviorClass) {
                self::getPropertyCompletion($completionList, $behaviorClass, $factory, $recursionDepth, $path);
            }
        }
    }

    // Private Static Methods
    // =========================================================================

    /**
     * Add in the element types that could be injected as route variables
     *
     * @return array
     */
    private static function elementRouteVariables(): array
    {
        $routeVariables = [];
        $elementTypes = Craft::$app->elements->getAllElementTypes();
        foreach ($elementTypes as $elementType) {
            /* @var Element $elementType */
            $key = $elementType::refHandle();
            if (!empty($key) && !in_array($key, static::ELEMENT_ROUTE_EXCLUDES)) {
                $routeVariables[$key] = new $elementType();
            }
        }

        return $routeVariables;
    }

    /**
     * Override certain values that we always want hard-coded
     *
     * @return array
     */
    private static function overrideValues(): array
    {
        return [
            // Set the nonce to a blank string, as it changes on every request
            'nonce' => '',
        ];
    }
}
