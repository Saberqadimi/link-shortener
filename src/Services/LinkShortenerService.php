<?php

namespace Laravel\LinkShortener\Services;

use Laravel\LinkShortener\Models\ShortLink;
use Illuminate\Support\Str;

class LinkShortenerService
{
    public function createShortLink(string $originalUrl): ShortLink
    {
        $shortUrl = Str::random(6); 

        return ShortLink::createShortLink($originalUrl, $shortUrl);
    }

    public function incrementClickCount(string $shortUrl)
    {
        $link = ShortLink::where('short_url', $shortUrl)->first();

        if ($link) {
            $link->incrementClickCount();
        }
    }

    public function analyzeLink(string $shortUrl)
    {
        $link = ShortLink::where('short_url', $shortUrl)->firstOrFail();
        return $link->analyzeLink();
    }

    public function deleteShortLink(string $shortUrl)
    {
        $link = ShortLink::where('short_url', $shortUrl)->first();
    
        if (!$link) {
            return false;
        }
    
        $link->delete();
        return true;
    }
    
}
