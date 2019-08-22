# Issues & Upgrading

## Issues

Please report any issues you find to the [SEOmatic Issues](https://github.com/nystudio107/craft-seomatic/issues) page.

## Upgrading from SEOmatic 1.x for Craft CMS 2.x

If you are upgrading a site from Craft CMS 2.x to Craft CMS 3.x that used the older SEOmatic plugin, here's what you need to know.

SEOmatic will migrate your old Craft 2.x Field settings & data in the following ways:
 
 * The Content SEO settings for each Section where you had an old SEOmatic Meta FieldType will be migrated for you.
 
* If you add a new SEO Settings Field to a section that had an old SEOmatic Meta field in it, it will migrate any custom data you had entered on a per-Entry basis

**Important:** Keep your old Craft 2.x Seomatic_Meta fields intact; don't delete them or change the Field type to the new SEO Settings field type. Instead, create a new SEO Settings field in the same Section, Category Group, or Commerce Product Type. It will automatically look for and migrate data from the old Seomatic_Meta Field.

SEOmatic for Craft CMS 3 is a complete re-write and re-architecture from scratch of the plugin. This allowed us to take what we learned from SEOmatic 1.x, and rebuild it with a much more robust and extendable architecture.

If feasible, we think the best way to update sites using SEOmatic is to start fresh, and explore how the conceptual changes in the plugin affect how you use it. In most cases, you don't even need to use an SEOmatic Field, and the setup is cleaner and easier without it! We hope you love it!

**N.B.:** The Twig templating syntax has changed (but you may not need to use Twig at all with the new version), so give the docs a once-over.

Brought to you by [nystudio107](https://nystudio107.com/)
