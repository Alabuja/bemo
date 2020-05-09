<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getPages()
    {
        return self::get();
    }

    public function getPage($pageId)
    {
        return self::where('id', $pageId)->first();
    }

    public function getPageByUrl($url)
    {
        return self::where('page_url', $url)->first();
    }

    public function pageCount()
    {
        return self::count();
    }
}
