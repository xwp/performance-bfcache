# Performance BFCACHE

> Improves browser Back/Forward Cache (BFCACHE) performance by blocking unload events for visitors.

## Features

- **Permissions-Policy Header:** Adds `Permissions-Policy: unload=()` header to prevent unload event listeners from being registered.
- **Visitor-Only Application:** Only applies to visitors (non-logged-in users) to preserve admin functionality.
- **BFCACHE Optimization:** Improves page load performance when users navigate back/forward through browser history.

## How It Works

The plugin sets a Permissions-Policy response header that blocks JavaScript from adding `unload` event listeners. This prevents pages from being excluded from the browser's Back/Forward Cache, resulting in:

- **Instant Navigation:** Pages load instantly when users click back/forward buttons
- **Reduced Server Load:** Cached pages don't require new server requests
- **Better User Experience:** Faster perceived performance for returning visitors

### Installation Using Composer

To install the plugin via Composer, follow these steps:

1. **Add the Repository:**
   - Open your project's `composer.json` file.
   - Add the following under the `repositories` section:

     ```json
     "repositories": [
         {
             "type": "vcs",
             "url": "https://github.com/xwp/performance-bfcache"
         }
     ]
     ```

## Usage

The plugin works automatically once activated. Example of the header output:

```http
Permissions-Policy: unload=()
```

This header is only sent for:
- Homepage visits by non-logged-in users
- Blog posts and pages viewed by visitors
- Category, tag, and archive pages for anonymous users
- Search results for non-authenticated users

## Admin Preservation

The plugin intelligently excludes the header when:
- Users are logged in and the admin bar is showing
- Viewing WordPress admin pages
- Making AJAX or API requests

This ensures that admin functionality that may depend on unload events continues to work normally.

## Technical Details

The plugin hooks into WordPress's `wp_headers` action to add the Permissions-Policy header specifically for front-end page requests. It uses WordPress's `is_admin_bar_showing()` function to detect when users should receive the optimization.

### Browser Compatibility

The Permissions-Policy header is supported by:
- Chrome/Chromium 88+
- Firefox 74+
- Safari 16.4+

Unsupported browsers will simply ignore the header without any negative effects.

## Requirements

- **WordPress:** Version 5.0 or higher
- **PHP:** Version 7.4 or higher

## Implementation Reference

This plugin follows the implementation guidelines from the [Permissions Policy Unload Explainer](https://github.com/fergald/docs/blob/master/explainers/permissions-policy-unload.md#example-1---disable-unload-events-entirely).

## License

This plugin is licensed under the GPLv3 or later.
