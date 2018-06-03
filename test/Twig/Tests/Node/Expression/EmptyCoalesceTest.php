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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Twig_Tests_Node_Expression_EmptyCoalesceTest extends Twig_Test_NodeTestCase
{
    public function getTests()
    {
        $left = new Twig_Node_Expression_Name('foo', 1);
        $right = new Twig_Node_Expression_Constant(2, 1);
        $node = new Twig_Node_Expression_EmptyCoalesce($left, $right, 1);

        return array(array($node, "((// line 1\n\$context[\"foo\"]) ?? (2))"));
    }
}
