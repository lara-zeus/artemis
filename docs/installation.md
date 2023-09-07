---
title: Installation
weight: 2
---

## Composer

You can install the package via composer:

```bash
composer require lara-zeus/artemis
```

## Assets
Publish the assets files:

```bash
php artisan vendor:publish --tag=zeus-assets
```

## Config

```bash
php artisan vendor:publish --tag=zeus-artemis-config
php artisan vendor:publish --tag=zeus-config
```

now, open the file `zeus.php` and set the layout and theme:

```php
'layout' => 'zeus::themes.daisy.layouts.app',
'theme' => 'daisy',
```

### Navigation

to setup the main menu, head to the admin page and create the menu.

then set the slug in the `zeus-artemis.php` config file
