<?php

namespace Laravel\LinkShortener\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = ['original_url', 'short_url', 'click_count' , 'user_id'];
    protected $table = 'short_links';
    
    public function incrementClickCount()
    {
        $this->increment('click_count');
    }

    public function analyzeLink()
    {
        return [
            'short_url' => $this->short_url,
            'click_count' => $this->click_count,
            'original_url' => $this->original_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public static function createShortLink(string $originalUrl, string $shortUrl)
    {
        return self::create([
            'user_id' => auth()->user()->id,
            'original_url' => $originalUrl,
            'short_url' => $shortUrl,
            'click_count' => 0,
        ]);
    }
}

