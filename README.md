# folded/exception

Various kind of exception to throw for your web app.

## Summary

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library to share exception that I use on both of the packages that compose Folded.

These exceptions are common errors I use for my web apps, that you can also use to provide more sense to your errors instead of using the classic `Exception`.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/config](https://github.com/folded-php/config): Configuration and environment utilities for your PHP web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.
- [folded/view](https://github.com/folded-php/view): View utilities for your PHP web app.

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

- [1. FolderNotFoundException](#1-folder-not-found-exception)
- [2. MethodNotAllowedException](#2-method-not-allowed-exception)
- [3. NotAFolderException](#3-not-a-folder-exception)
- [4. UrlNotFoundException](#4-url-not-found-exception)

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

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
