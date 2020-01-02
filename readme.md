# MetaScrapper

Laravel 6 package to get all the meta data from a URL. 

It will first check the URL for it's Mime type.

## Supports

- Meta tags
- Twitter tags
- OpenGraph tags
- Any other type of tag
- Files (Image, Audio, Video)
- Application Mime type


## Installation

Via Composer

```bash
$ composer require hojabbr/metascrapper
```

## Usage

```php
use hojabbr\MetaScrapper\Facades\MetaScrapper;

return MetaScrapper::scrap("http://www.yahoo.com");
```

This will return an array of all the meta for the given URL.
