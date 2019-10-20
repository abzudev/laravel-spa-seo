# A Laravel SPA SEO enhancer

PLEASE NOTE: This package is still under development.

## Example

##### Controller:

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abzudev\LaravelSpaSeo\SpaContent;

class AppController extends Controller
{
    /**
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $context['html_source'] = SpaContent::getHtmlContent($request);

        return view('index', $context);
    }
}
```

##### Blade:

```
<!DOCTYPE html>
<html lang="en">
<head>
    \\ Head content
</head>
<body>

<div id="app">
    @if(isset($html_source) and !empty($html_source))
        {!! $html_source !!}
    @else
        \\ Content
    @endif
</div>

// Any additional HTML
</body>
</html>
```

##### Notes:
The package returns the rendered html of the **first** div found within the body tag. 
So to ensure that the correct html is returned, ensure the first div of the body is the mounting 
element of your SPA. After the first div you can place any additional content, but
this will not be included in the rendered html.

## Requirements

This package requires node 8.0 or higher and the Puppeteer Node library and makes use of 
[nesk/puphpeteer](https://github.com/nesk/puphpeteer) package.

You will need to install [@nesk/puphpeteer](https://www.npmjs.com/package/@nesk/puphpeteer) in your project via NPM:

```bash
npm install @nesk/puphpeteer
```

## Installation

To install this package simply run:

``` bash
composer require abzudev/laravel-spa-seo
```

If you are using Laravel 5.5+ then the package will register itself automatically.

Alternatively, you will need to add the SpaSeoServiceProvider to the list of providers in app.php.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Abzudev\LaravelSpaSeo\SpaSeoServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the cache
    | to be allowed to remain idle before it expires.
    |
    */

    'cache_lifetime' => env('SPA_CACHE_LIFETIME', 60),

    /*
    |--------------------------------------------------------------------------
    | Route Lifetime
    |--------------------------------------------------------------------------
    |
    | This array of routes will allow you to specify the cache lifetime
    | of specific routes. By default each route will use the 'cache_lifetime'
    | as the amount of minutes that vue will be cached.
    |
    */

    'routes' => [

//        '/' => 60, (1 hour)
//        '/about' => 1440, (1 day)
//        '/contact' => 43200, (30 days)

    ],

];
```

## Testing

Run the tests with:

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email jeandrew.swart@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
