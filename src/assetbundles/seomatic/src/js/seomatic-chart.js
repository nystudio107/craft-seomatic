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
require('../css/seomatic-chart.css');
require('billboard.css');

// Images

// JavaScript
import {bb} from 'billboard.js';

// Set the window.bb global so we can use it in Twig
window.bb = bb;

$(function () {
});
