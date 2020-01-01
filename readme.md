# MetaScrapper

Laravel 6 package to get all the meta data from a URL

## Installation

Via Composer

```bash
$ composer require hojjabr/metascrapper
```

## Usage

```php
use hojjabr\MetaScrapper\Facades\MetaScrapper;

return MetaScrapper::scrap("http://www.yahoo.com");
```

This will return an array of all the meta for the given URL.
