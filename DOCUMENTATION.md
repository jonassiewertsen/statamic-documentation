# Documentation for Statamic Documentation
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonassiewertsen/statamic-butik.svg?style=flat-square)](https://packagist.org/packages/jonassiewertsen/statamic-butik)

## Beta

"Documentation" is an addon for Statamic v3, which is in beta right now. Until Statamic v3 is in beta, there can be breaking changes!

## Installation

General installation instructions can be found in the README.md

## Rename the collection
The collection will be named `documentation` by default. You can easily rename those in the config file, **before** running the `php artisan documentation:setup`.

Remember to publish the config file, before you can make any changes:
`php artisan vendor:publish`

## Customize your language
There aren't many things you can localize, but by doing so you will make your control panel looking awesome. 

Publish the lanuges files:
`php artisan vendor:publish`

Copy our langue file into a new folder, matching your application locale (/config/app.php). 

## Predefine the folder for selfhosted videos
You can define the asset container and the folder, where your videos should be saved, in the blueprints settings. 

In your control panel, go to: Fields -> Blueprints -> documentation

