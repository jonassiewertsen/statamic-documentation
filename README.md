# Statamic Documentation
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonassiewertsen/statamic-documentation.svg?style=for-the-badge)](https://packagist.org/packages/jonassiewertsen/statamic-documentation)

A Statamic V3 Addon to save any kind of documentation inside your control panel.

## Features
- [x] Documentation available in the control panel
- [x] Menu structure with children (max depth 2)
- [x] Flexible text editing with bard editor
- [x] Elements: Title, H2, H3, bold, italic, underlinded, ordered- and unordered lists, tables, blockuotes and links
- [x] Videos can be embedded: Self hosted, from YouTube or Vimeo
- [x] Optional video description
- [ ] Permissions (not added yet)

# Looking for less?
Would it be enough to list videos only? Check out my "How To" Addon:
[How To Addon](https://statamic.com/marketplace/addons/how-to-addon)

## Installation
### Step 1
Pull in your package with composer
```bash
composer require jonassiewertsen/statamic-documentation
```

### Step 2 - Enjoy


Create your first documentation page inside the control panel. 

Documentation -> Manage -> Create Entry
Write something useful and save it. 

## Troubeshooting
### PHP Fatal error:  Allowed memory size error?
Bypass the memory limit for composer to avoid this error:
```bash
COMPOSER_MEMORY_LIMIT=-1 composer require jonassiewertsen/statamic-documentation
```


# Requirements
- Statamic V3
- Laravel 7 or 8
- min. PHP 7.3

# License 

Before going into productions with *Statamic Documentation*, you need to buy a license at the [Statamic Marketplace](https://statamic.com/addons/jonassiewertsen/documentation). 

*Statamic Documentation* is not free software. 
