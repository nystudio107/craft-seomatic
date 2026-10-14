<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2026 nystudio107
 */

namespace nystudio107\seomatictests\unit;

use Codeception\Test\Unit;
use nystudio107\seomatic\twigextensions\SeomaticTwigExtension;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Loader\ArrayLoader;
use UnitTester;

/**
 * EmptyCoalesceUnitTest
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     5.1.23
 */
class EmptyCoalesceUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Tests
    // =========================================================================

    /**
     * Each operand of `???` should be evaluated only once
     */
    public function testOperandsAreEvaluatedOnce()
    {
        $left = new EmptyCoalesceCounter('foo');
        $right = new EmptyCoalesceCounter('bar');
        $this->assertSame('foo', $this->render('{{ left.value() ??? right.value() }}', compact('left', 'right')));
        $this->assertSame(1, $left->calls);
        $this->assertSame(0, $right->calls);

        $left = new EmptyCoalesceCounter('');
        $right = new EmptyCoalesceCounter('bar');
        $this->assertSame('bar', $this->render('{{ left.value() ??? right.value() }}', compact('left', 'right')));
        $this->assertSame(1, $left->calls);
        $this->assertSame(1, $right->calls);
    }

    /**
     * Chained `???` operators should evaluate each operand only once
     */
    public function testChainedOperandsAreEvaluatedOnce()
    {
        $first = new EmptyCoalesceCounter([]);
        $second = new EmptyCoalesceCounter('');
        $third = new EmptyCoalesceCounter('baz');
        $this->assertSame(
            'baz',
            $this->render('{{ first.value() ??? second.value() ??? third.value() ??? "fallback" }}', compact('first', 'second', 'third'))
        );
        $this->assertSame(1, $first->calls);
        $this->assertSame(1, $second->calls);
        $this->assertSame(1, $third->calls);
    }

    /**
     * The first value that is defined, not null, and not empty should be returned
     */
    public function testEmptyCoalesceSemantics()
    {
        $this->assertSame('bark', $this->render('{{ woof ??? bar ??? foo ??? baz ??? "bark" }}', [
            'bar' => null,
            'foo' => '',
            'baz' => [],
        ]));
        $this->assertSame('foo', $this->render('{{ "foo" ??? "bar" }}'));
        $this->assertSame('0', $this->render('{{ 0 ??? "bar" }}'));
        $this->assertSame('bar', $this->render('{{ false ??? "bar" }}'));
        $this->assertSame('bar', $this->render('{{ obj ??? "bar" }}', ['obj' => new EmptyCoalesceCounter('')]));
        $this->assertSame('bar', $this->render('{{ items ??? "bar" }}', ['items' => new \ArrayObject()]));
        $this->assertSame('1,x,3', $this->render('{{ [1, "", 3]|map(v => v ??? "x")|join(",") }}'));
        $this->assertSame('null', $this->render('{{ (woof ??? "") is null ? "null" : "not null" }}'));
    }

    // Protected Methods
    // =========================================================================

    /**
     * Render a Twig string with only the `???` operator registered
     *
     * @param string $template
     * @param array $variables
     * @return string
     */
    protected function render(string $template, array $variables = []): string
    {
        $twig = new Environment(new ArrayLoader(['test' => $template]), [
            'strict_variables' => true,
            'cache' => false,
        ]);
        $twig->addExtension(new class() extends AbstractExtension {
            public function getExpressionParsers(): array
            {
                return (new SeomaticTwigExtension())->getExpressionParsers();
            }
        });

        return $twig->render('test', $variables);
    }
}

/**
 * Returns a fixed value and counts how often it was asked for it
 */
class EmptyCoalesceCounter
{
    /**
     * @var int
     */
    public int $calls = 0;

    /**
     * @param mixed $value
     */
    public function __construct(public mixed $result)
    {
    }

    /**
     * @return mixed
     */
    public function value(): mixed
    {
        $this->calls++;

        return $this->result;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->result;
    }
}
