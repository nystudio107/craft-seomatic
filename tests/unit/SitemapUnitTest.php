<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\seomatictests\unit;

use Codeception\Test\Unit;
use nystudio107\seomatic\helpers\Sitemap as SitemapHelper;
use UnitTester;

/**
 * SitemapUnitTest
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     5.1.24
 */
class SitemapUnitTest extends Unit
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
     * Text elements such as <news:title> and <news:name> are escaped for XML but not URL-encoded
     */
    public function testEncodeSitemapText()
    {
        $this->assertSame(
            'This title is not url encoded',
            SitemapHelper::encodeSitemapText('This title is not url encoded')
        );
        $this->assertSame(
            'Q&amp;A: Ölpreis steigt um 5% &lt;heute&gt; (Bericht)',
            SitemapHelper::encodeSitemapText('Q&A: Ölpreis steigt um 5% <heute> (Bericht)')
        );
    }

    /**
     * URL elements such as <loc> are still URL-encoded and escaped for XML
     */
    public function testEncodeSitemapEntity()
    {
        $this->assertSame(
            'https://example.com/news/caf%C3%A9?a=1&amp;b=2',
            SitemapHelper::encodeSitemapEntity('https://example.com/news/café?a=1&b=2')
        );
    }
}
