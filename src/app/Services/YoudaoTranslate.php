<?php

namespace App\Services;

use App\Services\YoudaoTranslate\Html;
use App\Services\YoudaoTranslate\Text;
use Illuminate\Support\Facades\Log;

class YoudaoTranslate
{
    public function translate($text, $from, $to)
    {
        if (strip_tags($text) != $text) {
            $translator = new Html();
        } else {
            $translator = new Text();
        }
        return $translator->translate($text, $from, $to);
    }
}
