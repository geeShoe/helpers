# helpers
Helpers is a collection of functions commonly used throughout Geeshoe applications.

_Helpers is currently in initial development. As such, some documentation and tests
may be missing._

 Latest Recommended version: v0.4.0 Released March 19th, 2020
 
 Test coverage: 100%.
 ```
    Time: 44 ms, Memory: 6.00 MB
    
    OK (33 tests, 33 assertions)
 ```

While in initial development, the `master` branch contains all project files. Once helpers is
in a stable state for initial release, the `master` branch will no longer include development files. I.e.
`phpunit.xml`, `.docker`, `Makefile`, etc...

## Getting Started

Helpers is intended to be fully compliant with 
[PSR-1](https://www.php-fig.org/psr/psr-1/),
[PSR-2](https://www.php-fig.org/psr/psr-2/),
 & [PSR-4](https://www.php-fig.org/psr/psr-4/)

## Prerequisites

* PHP 7.1+ | PHP 8

## Installing

To add Helpers to your project, run:

```
composer require geeshoe/helpers
```

## Usage

All helper functions are available as static method's. Usage is as simple as
```
$result = Geeshoe\Helpers\Files\FileHelpers::checkIsRW(/path/to/file/);
``` 

## Documentation

More extensive documentation on Helpers is to be released soon. In the
meantime, all of the methods and properties are well documented within the
code base.

## Development

Docker containers are provided for development purposes. To use the containers,
copy `.docker/.env.DIST` to `.docker/.env`, `.docker/xdebug-DIST.ini` to `.docker/php-cli/xdebug.ini`
and update their respective values.

A `Makefile` is provided to assist in managing the containers as well as running
phpunit, php-cs, and phpstan within the workspace container.

From the project root directory, typing `make` on the command line will print available make commands.

Helpers was developed on Debian Buster and as such any associated docker, make, etc. files have
not been tested in other environments.

## Authors

* **Jesse Rushlow** - *Lead developer* - [geeShoe Development](http://geeshoe.com)

Source available at (https://github.com/geeshoe/helpers)

For questions, comments, or rant's, drop me a line at 
```
jr (at) geeshoe (dot) com
```
