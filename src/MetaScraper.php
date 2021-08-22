<?php

namespace rookmoot\MetaScraper;

use DOMDocument;

class MetaScraper
{
    public function scrape($url)
    {
        stream_context_set_default(
            array(
                'http' => array(
                    'method' => 'HEAD'
                )
            )
        );
        $headers = get_headers($url, 1);
        $type = $headers['Content-Type'];
        if (is_array($type)) {
            $type = $type[0];
        }
        $maintype = explode("/", $type, 2);
        switch ($maintype[0]) {
            case 'application':
                return [
                    'type' => $type,
                    'application' => $url,
                    'application:url' => $url,
                ];
                break;
            case 'audio':
                return [
                    'type' => $type,
                    'audio' => $url,
                    'audio:url' => $url,
                ];
                break;
            case 'video':
                return [
                    'type' => $type,
                    'video' => $url,
                    'video:url' => $url,
                ];
                break;
            case 'image':
                return [
                    'type' => $type,
                    'image' => $url,
                    'image:url' => $url,
                ];
                break;
            default:
                $response = $this->get_tags($url);
        }

        return $response;
    }

    protected function get_tags($url)
    {
        $html = $this->curl_get_contents($url);
        $doc = new DOMDocument();
        @$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        $tags = $doc->getElementsByTagName('meta');
        $metadata = [];
        foreach ($tags as $tag) {
            $metaproperty = ($tag->hasAttribute('property')) ? $tag->getAttribute('property') : $tag->getAttribute('name');
            $key = (strpos($metaproperty, 'og:') === 0) ? strtr(substr($metaproperty, 3), '-', '_') : $metaproperty;
            $value = $tag->getAttribute('content');
            if (!empty($key)) {
                $metadata[$key] = $value;
            }
        }
        return $metadata;
    }


    protected function curl_get_contents($url)
    {
        $headers = [
            'Cache-Control: no-cache',
            'User-Agent: Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
        ];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_FAILONERROR    => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_HTTPHEADER     => $headers,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
