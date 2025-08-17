# Twig Sandbox

SEOmatic uses a [Twig Sandbox](https://github.com/nystudio107/craft-twig-sandbox) for security purposes when rendering the Twig code in its meta items.

By default, it uses a [blacklist security policy](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-sandbox.php) that disallows certain Twig tags that could be considered unsafe.

The default security policy is located in the SEOmatic package in `src/seomatic-sandbox.php`.

Should you wish to customize it, you can copy the `seomatic-sandbox.php` to the Craft `config/` directory, and then make any changes you like to the sandbox security policy that SEOmatic uses.

The `seomatic-sandbox.php` file in the Craft `config/` directory will be automatically used if it exists, instead of the built-in version of the file, 

Here’s what the default `seomatic-sandbox.php` looks like:

```php
<?php

/**
 * seomatic-sandbox.php
 *
 * This file exists only as a template for a sandbox configuration.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'seomatic-sandbox.php'
 * and make your changes there to override default settings.
 *
 */

use nystudio107\crafttwigsandbox\twig\BlacklistSecurityPolicy;

return [
    'class' => BlacklistSecurityPolicy::class,
    'twigTags' => [
        'autoescape',
        'block',
        'deprecated',
        'do',
        'embed',
        'extends',
        'flush',
        'from',
        'import',
        'include',
        'macro',
        'sandbox',
        'use',
        'verbatim',
        'cache',
        'css',
        'dd',
        'dump',
        'exit',
        'header',
        'hook',
        'html',
        'js',
        'namespace',
        'nav',
        'paginate',
        'redirect',
        'requireAdmin',
        'requireEdition',
        'requireGuest',
        'requireLogin',
        'requirePermission',
        'script',
        'tag',
    ],
    'twigFilters' => [
        'convert_encoding',
        'data_uri',
        'filter',
        'inky_to_html',
        'inline_css',
        'map',
        'merge',
        'reduce',
        'sort',
        'spaceless',
        'url_encode',
        'append',
        'attr',
        'base64_decode',
        'base64_encode',
        'column',
        'encenc',
        'filesize',
        'filter',
        'hash',
        'json_encode',
        'json_decode',
        'multisort',
        'namespace',
        'ns',
        'namespaceAttributes',
        'namespaceInputId',
        'namespaceInputName',
        'parseAttr',
        'parseRefs',
        'prepend',
        'removeClass',
        'where',
    ],
    'twigFunctions' => [
        'attribute',
        'block',
        'constant',
        'cycle',
        'dump',
        'html_classes',
        'parent',
        'source',
        'template_from_string',
        'actionInput',
        'alias',
        'beginBody',
        'block',
        'canCreateDrafts',
        'canDelete',
        'canDeleteForSite',
        'canDuplicate',
        'canSave',
        'canView',
        'ceil',
        'className',
        'clone',
        'combine',
        'configure',
        'constant',
        'create',
        'csrfInput',
        'dump',
        'endBody',
        'expression',
        'failMessageInput',
        'getenv',
        'gql',
        'head',
        'hiddenInput',
        'input',
        'parseBooleanEnv',
        'plugin',
        'redirectInput',
        'renderObjectTemplate',
        'source',
        'successMessageInput',
    ],
    'twigMethods' => [
    ],
    'twigProperties' => [
    ],
];
```

If you use a Twig tag/filter/function that is disallowed by the security policy, SEOmatic will throw a `SecurityPolicy` error that will be logged by Craft, and leave the resulting Twig code unrendered.

For example, if you did:
```twig
    {% do seomatic.meta.seoTitle('{{ dump(seomatic) }}') %}
```

Since the `dump` function is disallowed by the default security policy, the resulting `seomatic.meta.seoTitle` variable would be set to <code v-pre>{{ dump(seomatic) }}</code> (the unrendered Twig code).

Extensive documentation on how the Twig sandbox works, and the particulars of configuring it can be found in the [Craft Twig Sandbox](https://github.com/nystudio107/craft-twig-sandbox) repository.
