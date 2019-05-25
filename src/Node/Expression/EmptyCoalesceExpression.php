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

namespace nystudio107\seomatic\Node\Expression;

use Twig\Compiler;
use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Node;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.1.50
 */
class EmptyCoalesceExpression extends AbstractExpression
{
    /**
     * Checks if a variable is empty.
     *
     *    {# evaluates to true if the foo variable is null, false, or the empty string #}
     *    {% if foo is empty %}
     *        {# ... #}
     *    {% endif %}
     *
     * @param mixed $value A variable
     *
     * @return bool true if the value is empty, false otherwise
     */
    public static function empty($value): bool
    {
        if ($value instanceof \Countable) {
            return 0 == \count($value);
        }

        if (\is_object($value) && method_exists($value, '__toString')) {
            return '' === (string) $value;
        }

        return '' === $value || false === $value || null === $value || [] === $value;
    }

    public function __construct(Node $left, Node $right, $lineno)
    {
        $left->setAttribute('ignore_strict_check', true);
        $left->setAttribute('is_defined_test', false);
        $right->setAttribute('ignore_strict_check', true);
        $right->setAttribute('is_defined_test', false);
        parent::__construct(
            ['left' => $left, 'right' => $right],
            ['ignore_strict_check' => true, 'is_defined_test' => false],
            $lineno
        );
    }

    public function compile(Compiler $compiler)
    {
        //$this->getNode('expr1')->setAttribute('always_defined', true);
        $compiler
            ->raw('(('.self::class.'::empty(')
            ->subcompile($this->getNode('left'))
            ->raw(') ? null : ')
            ->subcompile($this->getNode('left'))
            ->raw(') ?? ('.self::class.'::empty(')
            ->subcompile($this->getNode('right'))
            ->raw(') ? null : ')
            ->subcompile($this->getNode('right'))
            ->raw('))')
        ;
    }
}
