# folded/exception

Various kind of exception to throw for your web app.

[![Packagist License](https://img.shields.io/packagist/l/folded/exception)](https://github.com/folded-php/exception/blob/master/LICENSE) [![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/folded/exception)](https://github.com/folded-php/exception/blob/master/composer.json#L14) [![Packagist Version](https://img.shields.io/packagist/v/folded/exception)](https://packagist.org/packages/folded/exception) [![Build Status](https://travis-ci.com/folded-php/exception.svg?branch=master)](https://travis-ci.com/folded-php/exception) [![Maintainability](https://api.codeclimate.com/v1/badges/1a4cd312ebd463342bef/maintainability)](https://codeclimate.com/github/folded-php/exception/maintainability) [![TODOs](https://img.shields.io/endpoint?url=https://api.tickgit.com/badge?repo=github.com/folded-php/exception)](https://www.tickgit.com/browse?repo=github.com/folded-php/exception)

## Summary

- [About](#about)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library to share exception that I use on both of the packages that compose Folded.

These exceptions are common errors I use for my web apps, that you can also use to provide more sense to your errors instead of using the classic `Exception`.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/action](https://github.com/folded-php/action): A way to organize your controllers for your web app.
- [folded/config](https://github.com/folded-php/config): Configuration and environment utilities for your PHP web app.
- [folded/crypt](https://github.com/folded-php/crypt): Encrypt and decrypt strings for your web app.
- [folded/exception](https://github.com/folded-php/exception): Various kind of exception to throw for your web app.
- [folded/history](https://github.com/folded-php/history): Manipulate the browser history for your web app.
- [folded/http](https://github.com/folded-php/http): HTTP utilities for your web app.
- [folded/orm](https://github.com/folded-php/orm): An ORM for you web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.
- [folded/session](https://github.com/folded-php/session): Session functions for your web app.
- [folded/view](https://github.com/folded-php/view): View utilities for your PHP web app.

## Features

- Contains some exception to throw
- The exceptions contains methods to set additional data (like the folder path for the `FolderNotFoundException` for example) and retrieve these data

## Requirements

- PHP version >= 7.4.0
- Composer installed

## Installation

In your root project folder, run this command to install the package:

```bash
composer require folded/exception
```

## Examples

Most of the examples will add additional data by not directly throwing a new instance, but rather constructing an instance and using methods to add more context.

Keep in mind you are not forced to do it, and can just throw a message like you are used to with the classic `Exception`.

Using the methods you will discover below has the advantage to be able to give more context and facilitate the debugging when using an error management services such as Sentry, with its capability to [store additional data](https://docs.sentry.io/platforms/php/enriching-error-data/additional-data/manage-context/).

- [1. FolderNotFoundException](#1-foldernotfoundexception)
- [2. MethodNotAllowedException](#2-methodnotallowedexception)
- [3. NotAFolderException](#3-notafolderexception)
- [4. UrlNotFoundException](#4-urlnotfoundexception)
- [5. HistoryNotFoundException](#5-historynotfoundexception)
- [6. RouteNotFoundException](#6-routenotfoundexception)
- [7. SessionKeyNotFoundException](7-sessionkeynotfoundexception)

### 1. FolderNotFoundException

In this example, we will throw an exception when a folder path is not found.

```php
use Folded\Exceptions\FolderNotFoundException;

try {
  $exception = new FolderNotFoundException("folder foo not found");

  $exception->setFolder("foo");

  throw $exception;
} catch (FolderNotFoundException $exception) {
  echo "folder not found is {$exception->getFolder()}";
}
```

### 2. MethodNotAllowedException

In this example, we will throw an exception when an HTTP method is not allowed (HTTP status code 405).

```php
use Folded\Exceptions\MethodNotAllowedException;

try {
  $exception = new MethodNotAllowedException("method GET not allowed");

  $exception->setMethodNotAllowed("GET");
  $exception->setAllowedMethods(["POST", "DELETE"]);

  throw $exception;
} catch (MethodNotAllowedException $exception) {
  echo "method not allowed: {$exception->getMethodNotAllowed()}";

  $allowedMethods = $exception->getAllowedMethods();

  foreach ($allowedMethods as $allowedMethod) {
    echo "allowed method: $allowedMethod";
  }
}
```

### 3. NotAFolderException

In this example, we will throw an exception when a path is not a folder.

```php
use Folded\Exceptions\NotAFolderException;

try {
  $exception = new NotAFolderException("foo is not a folder");

  $exception->setFolder("foo");
} catch (NotAFolderException $exception) {
  echo "folder {$exception->getFolder()} is not a folder";
}
```

### 4. UrlNotFoundException

In this example, we will throw an exception when an URL is not found (HTTP status code 404).

```php
use Folded\Exceptions\UrlNotFoundException;

try {
  $exception = new UrlNotFoundException("url /about-us not found");

  $exception->setUrl("/about-us");

  throw $exception;
} catch (UrlNotFoundException $exception) {
  echo "url {$exception->getUrl()} not found";
}
```

### 5. HistoryNotFoundException

In this example, we will throw an exception when an history is not found on a browser history manager.

Check [folded/history](https://github.com/folded-php/history) for an example of package that deals with the browser history on back-end.

```php
use Folded\Exceptions\HistoryNotFoundException;

try {
  $exception = new HistoryNotFoundException("history 1 not found");
  $exception->setIndex(1);

  throw $exception;
} catch (HistoryNotFoundException $exception) {
  echo "index {$exception->getIndex()} not found in the history";
}
```

### 6. RouteNotFoundException

In this example, we will throw an exception if a route name is not found (when using a router for example).

```php
use Folded\Exceptions\RouteNotFoundException;

try {
  $exception = new RouteNotFoundException("route /about-us not found");
  $exception->setRoute("/about-us");

  throw $exception;
} catch (RouteNotFoundException $exception) {
  echo "route {$exception->getRoute()} not found";
}
```

### 7. SessionKeyNotFoundException

In this example, we will throw an exception if a key is not found in a session array.

```php
use Folded\Exceptions\SessionKeyNotFoundException;

try {
  $exception = new SessionKeyNotFoundException("key foo not found");
  $exception->setKey("foo");

  throw $exception;
} catch (SessionKeyNotFoundException $exception) {
  echo "key {$exception->getKey()} not found";
}
```

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
| v0.1.1 | ❌  | ✔️  | ❓  |
| v0.2.0 | ❌  | ✔️  | ❓  |
