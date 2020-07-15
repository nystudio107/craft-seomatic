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
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;

use Craft;

use Codeception\Test\Unit;
use UnitTester;

/**
 * ExampleUnitTest
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.9
 */
class SstiUnitTest extends Unit
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
     * Test the sanitizeUrl() method to ensure it sanitizes URLs properly
     */
    public function testSanitizeUrl()
    {
        // Strip Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('{{ craft.app.config.general.actionTrigger }}')
        );
        // Strip object syntax Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('{ craft.app.config.general.actionTrigger }')
        );
        // Strip URL-encoded Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('%7B%7B%20craft.app.config.general.actionTrigger%20%7D%7D')
        );
        // Strip URL-encoded object syntax Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('%7B%20craft.app.config.general.actionTrigger%20%7D')
        );
        // Strip HTML entity-encoded Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('&#x7B;&#x7B;&#x20;&#x63;&#x72;&#x61;&#x66;&#x74;&#x2E;&#x61;&#x70;&#x70;&#x2E;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x67;&#x2E;&#x67;&#x65;&#x6E;&#x65;&#x72;&#x61;&#x6C;&#x2E;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x54;&#x72;&#x69;&#x67;&#x67;&#x65;&#x72;&#x20;&#x7D;&#x7D;')
        );
        // Strip HTML entity-encoded object syntax Twig code
        $this->assertSame(
            '',
            DynamicMetaHelper::sanitizeUrl('&#x7B;&#x20;&#x63;&#x72;&#x61;&#x66;&#x74;&#x2E;&#x61;&#x70;&#x70;&#x2E;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x67;&#x2E;&#x67;&#x65;&#x6E;&#x65;&#x72;&#x61;&#x6C;&#x2E;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x54;&#x72;&#x69;&#x67;&#x67;&#x65;&#x72;&#x20;&#x7D;')
        );
        // Strip query strings
        $this->assertSame(
            '/woof',
            DynamicMetaHelper::sanitizeUrl('/woof?q=bark')
        );
        // Strip HTML
        $this->assertSame(
            '/woof/hello',
            DynamicMetaHelper::sanitizeUrl('/woof/<blockquote>hello</blockquote>')
        );
        // Proper text is returned, without the Twig code
        $this->assertSame(
            'The sum is: ',
            TextHelper::sanitizeFieldData('The sum is: {{ 2 + 2 }}')
        );
    }

    /**
     * Test the testSanitizeFieldData() method to ensure it sanitizes pulled field data
     */
    public function testSanitizeFieldData()
    {
        // Strip Twig code
        $this->assertSame(
            '',
            TextHelper::sanitizeFieldData('{{ craft.app.config.general.actionTrigger }}')
        );
        // Strip object syntax Twig code
        $this->assertSame(
            '( craft.app.config.general.actionTrigger )',
            TextHelper::sanitizeFieldData('{ craft.app.config.general.actionTrigger }')
        );
        // Strip URL-encoded Twig code
        $this->assertSame(
            '',
            TextHelper::sanitizeFieldData('%7B%7B%20craft.app.config.general.actionTrigger%20%7D%7D')
        );
        // Strip URL-encoded object syntax Twig code
        $this->assertSame(
            '( craft.app.config.general.actionTrigger )',
            TextHelper::sanitizeFieldData('%7B%20craft.app.config.general.actionTrigger%20%7D')
        );
        // Strip HTML entity-encoded Twig code
        $this->assertSame(
            '',
            TextHelper::sanitizeFieldData('&#x7B;&#x7B;&#x20;&#x63;&#x72;&#x61;&#x66;&#x74;&#x2E;&#x61;&#x70;&#x70;&#x2E;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x67;&#x2E;&#x67;&#x65;&#x6E;&#x65;&#x72;&#x61;&#x6C;&#x2E;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x54;&#x72;&#x69;&#x67;&#x67;&#x65;&#x72;&#x20;&#x7D;&#x7D;')
        );
        // Strip HTML entity-encoded object syntax Twig code
        $this->assertSame(
            '( craft.app.config.general.actionTrigger )',
            TextHelper::sanitizeFieldData('&#x7B;&#x20;&#x63;&#x72;&#x61;&#x66;&#x74;&#x2E;&#x61;&#x70;&#x70;&#x2E;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x67;&#x2E;&#x67;&#x65;&#x6E;&#x65;&#x72;&#x61;&#x6C;&#x2E;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x54;&#x72;&#x69;&#x67;&#x67;&#x65;&#x72;&#x20;&#x7D;')
        );
        // Strip HTML
        $this->assertSame(
            'hello',
            DynamicMetaHelper::sanitizeUrl('<blockquote>hello</blockquote>')
        );
        // Proper text is returned, without the Twig code
        $this->assertSame(
            'The sum is: ',
            TextHelper::sanitizeFieldData('The sum is: {{ 2 + 2 }}')
        );
    }
}
