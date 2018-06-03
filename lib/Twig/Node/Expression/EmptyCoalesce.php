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
class Twig_Node_Expression_EmptyCoalesce extends \Twig_Node_Expression_Conditional
{
    public function __construct(\Twig_Node $left, \Twig_Node $right, $lineno)
    {
        $test = new \Twig_Node_Expression_Binary_And(
            new \Twig_Node_Expression_Test_Defined(clone $left, 'defined', new \Twig_Node(), $left->getTemplateLine()),
            new \Twig_Node_Expression_Unary_Not(new \Twig_Node_Expression_Test_Null($left, 'null', new \Twig_Node(), $left->getTemplateLine()), $left->getTemplateLine()),
            $left->getTemplateLine()
        );

        parent::__construct($test, $left, $right, $lineno);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        /*
         * This optimizes only one case. PHP 7 also supports more complex expressions
         * that can return null. So, for instance, if log is defined, log("foo") ?? "..." works,
         * but log($a["foo"]) ?? "..." does not if $a["foo"] is not defined. More advanced
         * cases might be implemented as an optimizer node visitor, but has not been done
         * as benefits are probably not worth the added complexity.
         */
        if ($this->getNode('expr2') instanceof \Twig_Node_Expression_Name) {
            $this->getNode('expr2')->setAttribute('always_defined', true);
            $compiler
                ->raw('((empty(')
                ->subcompile($this->getNode('expr2'))
                ->raw(') ? null : ')
                ->subcompile($this->getNode('expr2'))
                ->raw(') ?? (empty(')
                ->subcompile($this->getNode('expr3'))
                ->raw(') ? null : ')
                ->subcompile($this->getNode('expr3'))
                ->raw('))')
            ;
        } else {
            parent::compile($compiler);
        }
    }
}

class_alias('Twig_Node_Expression_EmptyCoalesce', 'nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression', false);
