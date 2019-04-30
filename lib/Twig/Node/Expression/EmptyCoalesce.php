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

use nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.1.50
 */

@trigger_error(sprintf('Using the "Twig_Node_Expression_EmptyCoalesce" class is deprecated since Twig version 2.7, use "nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression" instead.'), E_USER_DEPRECATED);

class_exists('nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression');

if (\false) {
    class Twig_Node_Expression_EmptyCoalesce extends EmptyCoalesceExpression
    {
    }
}
