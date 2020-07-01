<?php
/**
 * Woof plugin for Craft CMS 3.x
 *
 * Woof
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\wooftests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use nystudio107\woof\Woof;

/**
 * ExampleUnitTest
 *
 *
 * @author    nystudio107
 * @package   Woof
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            Woof::class,
            Woof::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
