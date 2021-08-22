# MetaScraper with MIME support

Laravel 8 package to get all the meta data from a URL. 

It will first check the URL for it's Mime type.

Forked from an unsupported repo: rookmoot/MetaScrapper

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
$ composer require awizemann/metascraper
```

## Usage

```php
use awizemann\metascraper\Facades\MetaScraper;

$scraper = new MetaScraper;
return $scraper->scrape("https://yahoo.com");
```

This will return an array of all the meta for the given URL.
