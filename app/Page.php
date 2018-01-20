<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\Contracts\StaticPage;


class Page extends Model implements StaticPage {

    protected $fillable = ['slug', 'title', 'content', 'description', 'tags'];

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
