Wardrobe Disqus
===============

This package for Wardrobe CMS allows quick integration of disqus comment systems using a simple call to `Disqus::comments()` from your theme views.

While designed for Wardrobe, this package works across all Laravel installations.

## Installation Using Laravel 4 Package Installer

If you have [Laravel 4 Package Installer](https://github.com/rtablada/package-installer) installed you can install Wardrobe Disqus by running `php artisan package:install rtablada/wardrobe-disqus` and then publishing the configuration by running `php artisan config:publish rtablada/wardrobe-disqus`.

## Installing Using Composer

If you do not have Pacakge Installer, you can install Wardrobe Disqus by running `composer require rtablada/wardrobe-disqus` and then modifying your `providers` in `app/config/app.php` to include `Rtablada\WardrobeDisqus\WardrobeDisqusServiceProvider` and your `aliases` to include `'Disqus' => 'Rtablada\WardrobeDisqus\Facades\Disqus'`. Then run `php artisan config:publish rtablada/wardrobe-disqus`.

## Configuring Wardrobe Disqus

Configuring Wardrobe Disqus is as easy as going into `app/config/packages/rtablada/wardrobe-disqus/config.php` and modifying the `disqus_shortname` to the shortname found at disqus.com/admin/settings/

## Using Wardrobe Disqus

To include Disqus comments in your blog or project, simply include a call to `Disqus::comments()` and it will display the defaut Disqus comment form for each post or page.

In Wardrobe CMS it is best to place this in individual pages, or within your theme's `post.blade.php` so it may look like this:

```php
@extends(theme_path('layout'))

@section('title')
  {{ $post->title }}
@stop

@section('content')
  <section>
    <h2 class="title">{{ $post->title }}</h2>
    {{ md($post->content) }}

    @include(theme_path('inc.tags'))
    {{ Disqus::comments() }}
  </section>
@stop
```
