<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\models\MetaJsonLd;

use craft\web\Controller;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     1.0.0
 */
class JsonLdController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Get the fully composed schema type
     *
     * @param $schemaType
     *
     * @return \yii\web\Response
     */
    public function actionGetType($schemaType)
    {
        $result = null;
        $jsonLdType = MetaJsonLd::create($schemaType);

        if ($jsonLdType) {
            // Get the static properties
            try {
                $classRef = new \ReflectionClass(get_class($jsonLdType));
            } catch (\ReflectionException $e) {
                $classRef = null;
            }
            if ($classRef) {
                $result = $classRef->getStaticProperties();
            }
        }

        return $this->asJson($result);
    }

    /**
     * Get the decomposed schema type
     *
     * @param $schemaType
     *
     * @return \yii\web\Response
     */
    public function actionGetDecomposedType($schemaType)
    {
        $result = [];
        while ($schemaType) {
            $className = 'nystudio107\\seomatic\\models\\jsonld\\'.$schemaType;
            if (class_exists($className)) {
                try {
                    $classRef = new \ReflectionClass($className);
                } catch (\ReflectionException $e) {
                    $classRef = null;
                }
                if ($classRef) {
                    $staticProps = $classRef->getStaticProperties();

                    foreach ($staticProps as $key => $value) {
                        if ($key[0] == '_') {
                            $newKey = ltrim($key, '_');
                            $staticProps[$newKey] = $value;
                            unset($staticProps[$key]);
                        }
                    }
                    $result[$schemaType] = $staticProps;
                    $schemaType = $staticProps['schemaTypeExtends'];
                    if ($schemaType == "JsonLdType") {
                        $schemaType = null;
                    }
                }
            }
        }

        return $this->asJson($result);
    }
}
