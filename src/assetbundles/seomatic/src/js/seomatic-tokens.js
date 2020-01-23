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

// JavaScript
import Tokenfield from 'tokenfield';

// Tokenize any seomatic-keywords fields
let el = document.querySelector('.seomatic-keywords');
let keywords = undefined;
if (el && el.value) {
    keywords = el.value.split(',').map((value, index) => {
        if (value !== '') {
            return {id: index, name: value};
        }
    });
}
let options = {
    el: el,
    addItemOnBlur: true,
    addItemsOnPaste: true,
    delimiters: [','],
};
if (keywords !== undefined && keywords[0] !== undefined) {
    options.setItems = keywords;
}
let tf = new Tokenfield(options);
tf.on('change', (tokenField) => {
    let values = tokenField._vars.setItems.map((value) => {
        return value.name;
    });
    tokenField.el.value = values.join(',');
});
