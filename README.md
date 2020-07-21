
This package allows you to manage your website translation via admin.
You can create new language,Keys and values, then publish it and write it in language files.

### Installation
```shell
composer require root_rzbn/translation
```
Laravel 7 uses Package Auto-Discovery, so you are not required to add ServiceProvider manually.

### Laravel 5.5+
If you don't use Auto-Discovery, add the ServiceProvider to the providers array in ``config/app.php`` file
```php
   root_rzbn\translate\TranslatorServiceProvider::class,
```

### Default Filters Namespace
The default namespace for all filters is  ``App\EloquentFilters\``  with the base name of the Model.

For example:

Suppose we have a **User** model with an **AgeMoreThan** filter.As a result, the namespace filter must be as follows:

#### With Config file
You can optionally publish the config file with:
```sh
php artisan vendor:publish --provider="root_rzbn\translate\ServiceProvider" --tag="config"
```
And set the namespace for your model filters which will reside in:
```php
return [
    /*
     |--------------------------------------------------------------------------
     | Eloquent Filter Settings
     |--------------------------------------------------------------------------
     |
     | This is the namespace all you Eloquent Model Filters will reside
     |
     */
    'namespace' => 'root_rzbn\\translate\\',
];
```

## Usage
.....



## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
## Security

If you discover any security related issues, please email srouzbahani35@gmail.com instead of using the issue tracker.

## License
translation is released under the MIT License. See the bundled
 [LICENSE](https://github.com/sararzbn/Translation/blob/master/LICENSE)
 file for details.

Built with :heart: for you.


