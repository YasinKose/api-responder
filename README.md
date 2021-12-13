# Api Responder

[![Packagist](https://img.shields.io/packagist/v/yasinkose/api-responder.svg)](https://packagist.org/packages/yasinkose/api-responder)
[![Packagist](https://poser.pugx.org/yasinkose/api-responder/d/total.svg)](https://packagist.org/packages/yasinkose/api-responder)
[![Packagist](https://img.shields.io/packagist/l/yasinkose/api-responder.svg)](https://packagist.org/packages/yasinkose/api-responder)

## Description

A Simple Laravel package built to generate API Respond.

# Installation

To get started, Install via composer:

```bash
composer require yasinkose/api-responder
```

## Laravel

#### Register Service Provider

Append the following line to the `providers` key in `config/app.php` to register the package:

```php
YasinKose\ApiResponder\ServiceProvider::class,
```

or if you're using **Lumen**, Add the following snippet to the ```bootstrap/app.php``` file under the providers section
as follows:

```php
$app->register(YasinKose\ApiResponder\ServiceProvider::class);
```

#### Register Facades

If you're using **Laravel**, Add ```ApiResponder``` ```Facades``` to the ```aliases``` key:

```php
'Respond' => YasinKose\ApiResponder\Facades\ApiResponder::class,
```

or if you're using **Lumen** Add the following snippet to the ```bootstrap/app.php```

```php
class_alias(YasinKose\ApiResponder\Facades\ApiResponder::class, "Respond");
```

## Usage

```php
 Respond::ok(string $message = "OK", $attr = [])
 Respond::unAuthenticated(string $message = "Unauthorized", $errors = [])
 Respond::forbidden(string $message = "Forbidden", $errors = [])
 Respond::error(string $message = null, $errors = [])
 Respond::created($attr = null)
 Respond::failedValidation(string $message = "Unprocessable Entity", $errors = [])
 Respond::noContent(string $message = "No Content", $errors = [])
```

## Security

If you discover any security related issues, please email instead of using the issue tracker.

## Contributors ✨

Thanks goes to these people:

- [Yasin Köse](https://github.com/yasinkose/api-responder)
- [All contributors](https://github.com/yasinkose/api-responder/graphs/contributors)
