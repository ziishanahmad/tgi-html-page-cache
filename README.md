# TGI HTML Page Cache

A WordPress plugin to cache specific pages as HTML files for faster loading. Visit [tabsgi.com](https://tabsgi.com) for more information.

## Description

The TGI HTML Page Cache plugin allows you to cache specific pages of your WordPress site as static HTML files. This can significantly improve the load time of these pages, as the server can serve the static files directly instead of generating the content dynamically on each request.

## Features

- Caches specific pages as static HTML files
- Serves cached HTML files for faster loading
- Provides an admin interface to clear the cache

## Installation

### From the WordPress Admin Dashboard

1. **Download the Plugin**: Download the latest version of the plugin from the [releases page](https://github.com/ziishanahmad/tgi-html-page-cache/releases).

2. **Upload the Plugin**:
   - Go to your WordPress admin dashboard.
   - Navigate to `Plugins > Add New`.
   - Click on `Upload Plugin`.
   - Click on `Choose File` and select the `tgi-html-page-cache.zip` file you downloaded.
   - Click `Install Now`.

3. **Activate the Plugin**:
   - After the plugin is installed, click `Activate Plugin`.

### Using FTP

1. **Download the Plugin**: Download the latest version of the plugin from the [releases page](https://github.com/ziishanahmad/tgi-html-page-cache/releases).

2. **Extract the Plugin**:
   - Extract the `tgi-html-page-cache.zip` file to your local machine.

3. **Upload via FTP**:
   - Connect to your WordPress site's server using an FTP client.
   - Navigate to the `wp-content/plugins/` directory.
   - Upload the extracted `tgi-html-page-cache` folder to the `plugins` directory.

4. **Activate the Plugin**:
   - Go to your WordPress admin dashboard.
   - Navigate to `Plugins`.
   - Locate `TGI HTML Page Cache` and click `Activate`.

### Using WP-CLI

1. **Download and Install via WP-CLI**:
   - Open your terminal and navigate to your WordPress installation directory.
   - Run the following command to download and install the plugin:
     ```sh
     wp plugin install https://github.com/ziishanahmad/tgi-html-page-cache/archive/refs/heads/main.zip --activate
     ```

## Usage

Once the plugin is activated, it will automatically start caching pages that meet the criteria defined in the plugin. The cached HTML files will be stored in the `wp-content/cache/tgi-html-page-cache/` directory.

### Clearing the Cache

To clear the cache, follow these steps:

1. Go to your WordPress admin dashboard.
2. Navigate to `Settings > TGI HTML Page Cache`.
3. Click on the `Clear Cache` button.

## Customization

You can customize the caching criteria by modifying the `is_cachable` method in the `class-tgi-html-page-cache.php` file. By default, the plugin caches all pages. You can add your own logic to determine which pages should be cached.

```php
private function is_cachable() {
    // Add logic to determine if the page should be cached
    return is_page();
}
```

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## license
This project is licensed under the MIT License. See the [LICENSE](https://github.com/ziishanahmad/tgi-html-page-cache/blob/main/LICENSE) file for details.
