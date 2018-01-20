<?php

namespace App\Helpers\Contracts;

interface StaticPage {
    public static function findBySlug($slug);
}
