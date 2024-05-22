# Statamic Documentation
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonassiewertsen/statamic-documentation.svg?style=for-the-badge)](https://packagist.org/packages/jonassiewertsen/statamic-documentation)

A Statamic V3 Addon to save any documentation inside your control panel.

## Features
- [x] Documentation available in the control panel
- [x] Menu structure with children (max depth 2)
- [x] Flexible text editing with bard editor
- [x] Elements: Title, H2, H3, bold, italic, underlined, ordered- and unordered lists, tables, blockquotes and links
- [x] Videos can be embedded: Self-hosted, from YouTube or Vimeo
- [x] Optional video description
- [ ] Permissions

## Installation
### Step 1
Pull in your package with composer
```bash
composer require jonassiewertsen/statamic-documentation
```

### Step 2
Publish the config, collections and blueprint files:
```bash
    php artisan vendor:publish --provider="Jonassiewertsen\Documentation\ServiceProvider"
```

### Step 3 - Enjoy

Create your first documentation page inside the control panel. 

Documentation -> Manage -> Create Entry 

Write something useful and save it.

# Requirements
- Statamic 4 || 5
- Laravel 10 || 11
- PHP >= 8.1

# License 

Before going into productions with *Statamic Documentation*, you must buy a license at the [Statamic Marketplace](https://statamic.com/addons/jonassiewertsen/documentation). 

*Statamic Documentation* is not free software. 
