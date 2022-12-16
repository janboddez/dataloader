# DataLoader
Output YAML data anywhere in WordPress.

Download and install (use the ZIP file for now). Then move the `yaml` folder to `wp-content/uploads`, and add the following shortcode to any post or page:
```
[dataloader file="blogroll.yml" tpl="blogroll.php"]
```

The shortcode accepts, no, requires, two arguments: a YAML file, and a template file. The YAML file must live in `wp-content/uploads/yaml`, and the template must be placed in `wp-content/uploads/yaml/templates`. If your WordPress install uses a custom uploads location, adjust these paths accordingly.

Then, play around with the `yaml` folder's contents and adjust your shortcode(s) accordingly. (Protect your YAML and PHP template files as you see fit.)
