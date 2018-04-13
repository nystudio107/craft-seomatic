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

use nystudio107\seomatic\helpers\Schema as SchemaHelper;

use craft\web\Controller;

use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class JsonLdController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'get-type',
        'get-decomposed-type',
        'get-type-array',
        'get-type-menu',
        'get-single-type-menu',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Get the fully composed schema type
     *
     * @param string $schemaType
     *
     * @return Response
     */
    public function actionGetType($schemaType): Response
    {
        return $this->asJson(SchemaHelper::getSchemaType($schemaType));
    }

    /**
     * Get the decomposed schema type
     *
     * @param string $schemaType
     *
     * @return Response
     */
    public function actionGetDecomposedType($schemaType): Response
    {
        return $this->asJson(SchemaHelper::getDecomposedSchemaType($schemaType));
    }

    /**
     * Get an array of schema types
     *
     * @param string $path
     *
     * @return Response
     */
    public function actionGetTypeArray($path): Response
    {
        try {
            $schemaArray = SchemaHelper::getSchemaArray($path);
        } catch (\Exception $e) {
            $schemaArray = [];
        }

        return $this->asJson($schemaArray);
    }

    /**
     * Get a flattened menu of schema types as an array
     *
     * @param string $path
     *
     * @return Response
     */
    public function actionGetTypeMenu($path): Response
    {
        return $this->asJson(SchemaHelper::getTypeMenu($path));
    }

    /**
     * Return a single menu of schemas starting at $path
     *
     * @param string $path
     *
     * @return Response
     */
    public function actionGetSingleTypeMenu($path): Response
    {
        return $this->asJson(SchemaHelper::getSingleTypeMenu($path));
    }
}
