<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\seomatictests\unit;

use nystudio107\seomatic\Seomatic;

use Craft;

use Codeception\Test\Unit;
use UnitTester;

/**
 * ExampleUnitTest
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.15
 */
class MetaTagsUnitTest extends Unit
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

    public function testTitleTag()
    {
        // Test before
        $title = Seomatic::$plugin->title->create([
            'title' => 'Sweet Home',
            'siteName' => 'Alabama',
            'siteNamePosition' => 'before',
            'separatorChar' => '|',
        ]);
        $this->assertSame(
            '<title>🚧 Alabama | Sweet Home</title>',
            $title->render()
        );
        // Test after
        $title = Seomatic::$plugin->title->create([
            'title' => 'Sweet Home',
            'siteName' => 'Alabama',
            'siteNamePosition' => 'after',
            'separatorChar' => '|',
        ]);
        $this->assertSame(
            '<title>🚧 Sweet Home | Alabama</title>',
            $title->render()
        );
        // Test none
        $title = Seomatic::$plugin->title->create([
            'title' => 'Sweet Home',
            'siteName' => 'Alabama',
            'siteNamePosition' => 'none',
            'separatorChar' => '|',
        ]);
        $this->assertSame(
            '<title>🚧 Sweet Home</title>',
            $title->render()
        );
        // Test no title
        $title = Seomatic::$plugin->title->create([
            'title' => '',
            'siteName' => 'Alabama',
            'siteNamePosition' => 'before',
            'separatorChar' => '|',
        ]);
        $this->assertSame(
            '<title>🚧 Alabama</title>',
            $title->render()
        );
        // Test no siteName
        $title = Seomatic::$plugin->title->create([
            'title' => 'Sweet Home',
            'siteName' => '',
            'siteNamePosition' => 'before',
            'separatorChar' => '|',
        ]);
        $this->assertSame(
            '<title>🚧 Sweet Home</title>',
            $title->render()
        );

    }
}
