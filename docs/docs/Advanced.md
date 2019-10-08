# Advanced Usage

## Config Settings

SEOmatic supports the standard `config.php` multi-environment friendly config file for the plugin settings. Just copy the `config.php` to your Craft `config/` directory as `seomatic.php` and you can configure the settings in a multi-environment friendly way.

These are the same settings that are configured in the **Plugin Settings** in the Control Panel.

## Meta Bundle / Container Settings

The directory `vendor/nystudio107/seomatic/src/seomatic-config` contains a number of files that are used when initially configuring SEOmatic.

![Screenshot](./resources/screenshots/seomatic-seomatic-config.png)

You can copy this entire directory to your Craft `config/` directory, and customize the files to your heart's content. SEOmatic will first look in the `config/` directory for any given file, and then fall back on its own internal `seomatic-config` files.

Note that these files are only used when initially creating a meta bundle. That is, whenever the plugin is installed, or new Section, Category Groups, or Commerce Product Types are created. Once meta bundles have been created, changing the settings in the file will have no effect.

You can bump the `Bundle.php`'s `bundleVersion` setting if you want it to re-read your config settings.

## Headless SPA API

SEOmatic allows you to fetch the meta information for any page via a controller API endpoint, so you can render the meta data via a frontend framework like VueJS or React.

### GraphQL Query support

To retrieve SEOmatic container data through the native [GraphQL in Craft CMS 3.3](https://docs.craftcms.com/v3/graphql.html#sending-api-requests) or the [CraftQL plugin](https://github.com/markhuot/craftql), use the `seomatic` field in your graphql query. Each parameter will return that container's data, ready for insertion into the DOM.

You must as least pass in the URI you want metadata for:

```graphql
{
  seomatic (uri: "/") {
      metaTitleContainer
      metaTagContainer
      metaLinkContainer
      metaScriptContainer
      metaJsonLdContainer
  }
}
```

...and you can also pass in an optional `siteId`:

```graphql
{
  seomatic (uri: "/", siteId: 1) {
      metaTitleContainer
      metaTagContainer
      metaLinkContainer
      metaScriptContainer
      metaJsonLdContainer
  }
}
```

...and you can also pass in an optional `asArray` parameter:

```graphql
{
  seomatic (uri: "/", asArray: true) {
      metaTitleContainer
      metaTagContainer
      metaLinkContainer
      metaScriptContainer
      metaJsonLdContainer
  }
}
```
This defaults to `false` which returns to you HTML ready to be inserted into the DOM. If you set it to `true` then it will return a JSON-encoded array of the container data.

This is useful if you're using Next.js, Nuxt.js, Gatsby, Gridsome, or anything else that uses a library to insert the various tags. In this case, you want the raw data to pass along.

![Screenshot](./resources/screenshots/seomatic-craftql-query.png)

You can also piggyback on an entries query, to return all of your data for an entry as well as the SEOmatic metadata in one request:

```graphql
{
  entry(section: homepage) {
    id
    title
    ... on Homepage {
      seomatic {
        metaTitleContainer
        metaTagContainer
        metaLinkContainer
        metaScriptContainer
        metaJsonLdContainer
      }
    }
  }
}
```

In this case, no arguments are passed in, because the URI and siteId will be taken from the parent Entry element.

### Meta Container API Endpoints

To get all of the meta containers for a given URI, the controller action is:

```twig
/actions/seomatic/meta-container/all-meta-containers/?uri=/
```
...where `uri` is the path to obtain the meta information from.

This will return to you an array of meta containers, with the render-ready meta tags in each:

```json
{
    "MetaTitleContainer": "<title>[devMode] Craft3 | Homepage</title>",
    "MetaTagContainer": "<meta name=\"generator\" content=\"SEOmatic\"><meta name=\"referrer\" content=\"no-referrer-when-downgrade\"><meta name=\"robots\" content=\"all\">",
    "MetaLinkContainer": "<link href=\"http://craft3.test/\" rel=\"canonical\"><link type=\"text/plain\" href=\"/humans.txt\" rel=\"author\"><link href=\"http://craft3.test/\" rel=\"alternate\" hreflang=\"es\">",
    "MetaScriptContainer": "",
    "MetaJsonLdContainer": "<script type=\"application/ld+json\">{\"@context\":\"http://schema.org\",\"@type\":\"WebPage\",\"image\":{\"@type\":\"ImageObject\",\"height\":\"804\",\"width\":\"1200\"},\"inLanguage\":\"en-us\",\"mainEntityOfPage\":\"http://craft3.test/\",\"name\":\"Homepage\",\"url\":\"http://craft3.test/\"}</script><script type=\"application/ld+json\">{\"@context\":\"http://schema.org\",\"@type\":\"BreadcrumbList\",\"description\":\"Breadcrumbs list\",\"itemListElement\":[{\"@type\":\"ListItem\",\"item\":{\"@id\":\"http://craft3.test/\",\"name\":\"Homepage\"},\"position\":1}],\"name\":\"Breadcrumbs\"}</script>"
}
```
If you need to request a URI from a specific site in a multi-site setup, you can do that with the optional `siteId=SITE_ID` parameter:

```
/actions/seomatic/meta-container/all-meta-containers/?uri=/&siteId=2
```

Should you wish to have the items in the meta containers return as an array of data instead, you can do that with the optional `asArray=true` parameter:

```
/actions/seomatic/meta-container/all-meta-containers/?uri=/&asArray=true
```

Which will return the data in array form:
```json
{
    "MetaTitleContainer": {
        "title": {
            "title": "[devMode] Craft3 | Homepage"
        }
    },
    "MetaTagContainer": {
        "generator": {
            "content": "SEOmatic",
            "name": "generator"
        },
        "referrer": {
            "content": "no-referrer-when-downgrade",
            "name": "referrer"
        },
        "robots": {
            "content": "all",
            "name": "robots"
        }
    },
    "MetaLinkContainer": {
        "canonical": {
            "href": "http://craft3.test/",
            "rel": "canonical"
        },
        "author": {
            "href": "/humans.txt",
            "rel": "author",
            "type": "text/plain"
        },
        "alternate": {
            "href": "http://craft3.test/",
            "hreflang": "es",
            "rel": "alternate"
        }
    },
    "MetaScriptContainer": [],
    "MetaJsonLdContainer": {
        "WebPage": {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "image": {
                "@type": "ImageObject",
                "height": "804",
                "width": "1200"
            },
            "inLanguage": "en-us",
            "mainEntityOfPage": "http://craft3.test/",
            "name": "Homepage",
            "url": "http://craft3.test/"
        },
        "BreadcrumbList": {
            "@context": "http://schema.org",
            "@type": "BreadcrumbList",
            "description": "Breadcrumbs list",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "name": "Homepage",
                    "item": "http://craft3.test/",
                    "position": 1
                }
            ],
            "name": "Breadcrumbs"
        }
    }
}
```

You can also request individual meta containers.

Title container:

```
/actions/seomatic/meta-container/meta-title-container/?uri=/
```

...will return just the Title container:
```json
{
    "MetaTitleContainer": "<title>[devMode] Craft3 | Homepage</title>"
}
```

Tag container:

```
/actions/seomatic/meta-container/meta-tag-container/?uri=/
```

...will return just the Tag container:
```json
{
     "MetaTagContainer": "<meta name=\"generator\" content=\"SEOmatic\"><meta name=\"referrer\" content=\"no-referrer-when-downgrade\"><meta name=\"robots\" content=\"all\">"
 }
```

Script container:

```
/actions/seomatic/meta-container/meta-script-container/?uri=/
```

...will return just the Script container:
```json
{
    "MetaScriptContainer": ""
}
```

Link container:

```
/actions/seomatic/meta-container/meta-link-container/?uri=/
```

...will return just the Link container:
```json
{
    "MetaLinkContainer": "<link href=\"http://craft3.test/\" rel=\"canonical\"><link type=\"text/plain\" href=\"/humans.txt\" rel=\"author\"><link href=\"http://craft3.test/\" rel=\"alternate\" hreflang=\"es\">"
}
```

JSON-LD container:

```
/actions/seomatic/meta-container/meta-json-ld-container/?uri=/
```

...will return just the JSON-LD container:
```json
{
    "MetaJsonLdContainer": "<script type=\"application/ld+json\">{\"@context\":\"http://schema.org\",\"@type\":\"WebPage\",\"image\":{\"@type\":\"ImageObject\",\"height\":\"804\",\"width\":\"1200\"},\"inLanguage\":\"en-us\",\"mainEntityOfPage\":\"http://craft3.test/\",\"name\":\"Homepage\",\"url\":\"http://craft3.test/\"}</script><script type=\"application/ld+json\">{\"@context\":\"http://schema.org\",\"@type\":\"BreadcrumbList\",\"description\":\"Breadcrumbs list\",\"itemListElement\":[{\"@type\":\"ListItem\",\"item\":{\"@id\":\"http://craft3.test/\",\"name\":\"Homepage\"},\"position\":1}],\"name\":\"Breadcrumbs\"}</script>"
}
```

All of the individual container controller API endpoints also accept the `&asArray=true` parameter if you'd like the data in array form.
 
### Schema.org API Endpoints

To get a key/value array of a given [Schema.org](http://schema.org/docs/full.html) type:

```
/actions/seomatic/json-ld/get-type?schemaType=Article
```

To get a decomposed version of a given [Schema.org](http://schema.org/docs/full.html) type, with the properties grouped by each inherited type:

```
/actions/seomatic/json-ld/get-decomposed-type?schemaType=Article
```

To get a hierarchical array of all of the schema types: 

```
/actions/seomatic/json-ld/get-type-array?path=Article
```

You can narrow this down to a specific sub-type list by passing in a `path` of schema types delimited by a `.`:
```
/actions/seomatic/json-ld/get-type-array?path=CreativeWork.Article
```
...this would output all of the sub-types of `Article`:
```
{
  "AdvertiserContentArticle": "AdvertiserContentArticle",
  "NewsArticle": {
    "AnalysisNewsArticle": "AnalysisNewsArticle",
    "BackgroundNewsArticle": "BackgroundNewsArticle",
    "OpinionNewsArticle": "OpinionNewsArticle",
    "ReportageNewsArticle": "ReportageNewsArticle",
    "ReviewNewsArticle": "ReviewNewsArticle"
  },
  "Report": "Report",
  "SatiricalArticle": "SatiricalArticle",
  "ScholarlyArticle": {
    "MedicalScholarlyArticle": "MedicalScholarlyArticle"
  },
  "SocialMediaPosting": {
    "BlogPosting": {
      "LiveBlogPosting": "LiveBlogPosting"
    },
    "DiscussionForumPosting": "DiscussionForumPosting"
  },
  "TechArticle": {
    "APIReference": "APIReference"
  }
}
```

Brought to you by [nystudio107](https://nystudio107.com/)
