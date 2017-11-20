Master:
[![Build Status](https://travis-ci.org/jvleeuwen/laravel-cspreporter.svg?branch=master)](https://travis-ci.org/jvleeuwen/laravel-cspreporter)
[![Coverage Status](https://coveralls.io/repos/github/jvleeuwen/laravel-cspreporter/badge.svg?branch=master)](https://coveralls.io/github/jvleeuwen/laravel-cspreporter?branch=master&service=github)
[![Maintainability](https://api.codeclimate.com/v1/badges/7e8802ad60fcb229055d/maintainability)](https://codeclimate.com/github/jvleeuwen/laravel-cspreporter/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/7e8802ad60fcb229055d/test_coverage)](https://codeclimate.com/github/jvleeuwen/laravel-cspreporter/test_coverage)
[![StyleCI](https://styleci.io/repos/110119154/shield?branch=master)](https://styleci.io/repos/110119154)


Develop:
[![Build Status](https://travis-ci.org/jvleeuwen/laravel-cspreporter.svg?branch=develop)](https://travis-ci.org/jvleeuwen/laravel-cspreporter)
[![Coverage Status](https://coveralls.io/repos/github/jvleeuwen/laravel-cspreporter/badge.svg?branch=develop)](https://coveralls.io/github/jvleeuwen/laravel-cspreporter?branch=develop&service=github)
[![Maintainability](https://api.codeclimate.com/v1/badges/7e8802ad60fcb229055d/maintainability)](https://codeclimate.com/github/jvleeuwen/laravel-cspreporter/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/7e8802ad60fcb229055d/test_coverage)](https://codeclimate.com/github/jvleeuwen/laravel-cspreporter/test_coverage)
[![StyleCI](https://styleci.io/repos/110119154/shield?branch=develop)](https://styleci.io/repos/110119154)

# CSPreporter Laravel Package

## Installation

To get the latest version, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require jvleeuwen/laravel-cspreporter
```

## Using the package:
```php
// Return an array of current open/scheduled issues and maintenaince windows.
$array = cspreporter::uri('http://cspreporter.nl/rss/actueel/');

// Using the configuration file.
$array = cspreporter::uri({{config('cspreporter.uri').config('cspreporter.actueel)}});
```

## Returned array contents:
```php
$array = [
    'id'    		=> (integer) $item->attributes()->id,
    'title' 		=> (string) $item->title,
    'description'	=> (string) $item->description,
    'pubDate'		=> (string) $item->pubDate,
    'startDate'		=> (string) $item->startDate,
    'endDate'		=> (string) $item->endDate,
    'category'		=> (string) $item->category,
    'link'			=> (string) $item->link,
];
```

## .Env options:
These value's are currently set by default if not present in the .env file:
```
CSPREPORTER_URI=http://cspreporter.nl/rss/
CSPREPORTER_WERKZAAMHEDEN=werkzaamheden/
CSPREPORTER_STORINGEN=storingen/
CSPREPORTER_ACTUEEL=actueel/
```

## Available commands:
```php
// Uri:
$array = cspreporter::uri('<cspreporter uri>'); // grabs the uri and returns the xml as an array;

// File:
$file = cspreporter::file('<localFile>'); // parses the file and returns the xml as an array;

// Test:
$test = cspreporter::test(); // Temporary test function, will be removed later on.

// ParseRss:
$parse = cspreporter::ParseRss('simplexml_load_string('filecontents')'); // implements the simplexml_load_string, parses the xml and returns an array;
```

## Scheduling:
See the Laravel docs on [scheduling](https://laravel.com/docs/master/scheduling).
Advising is to pull the Feed once every 10 minutes or less.
This prevents the App from beeing blocked.

## Tests:
All the needed tests are provided in the /tests dir.
If u are missing something check the Questions and commands section.

## Questions and comments:
I am allways open for questions and comments. Just reach out to me and i will do my best.

## License
This package is licensed under [The MIT License (MIT)](LICENSE).
