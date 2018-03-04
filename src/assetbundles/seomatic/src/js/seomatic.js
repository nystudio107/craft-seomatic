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
 * @package   SEOmatic
 * @since     3.0.0
 */

// CSS
require('../css/css-reset.css');
require('../css/style.css');
require('bootstrap-tokenfield/dist/css/bootstrap-tokenfield.min.css');

// Images
require('../img/Seomatic-icon.svg');
require('../img/link-icon.svg');
require('../img/redirects-icon.svg');
require('../img/script-icon.svg');
require('../img/sitemap-icon.svg');
require('../img/structured-data-icon.svg');
require('../img/tags-icon.svg');
require('../img/variables-icon.svg');
require('../img/missing_image.png');
require('../img/no_image_set.png');

// JavaScript
require('bootstrap-tokenfield/js/bootstrap-tokenfield.js');

$(function () {

    $('.seoKeywords').tokenfield({
        createTokensOnBlur: true,
    });

});