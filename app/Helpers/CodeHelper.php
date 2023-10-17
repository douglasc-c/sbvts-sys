<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CodeHelper
{
    /**
     * @return string
     */
    public static function generate($model)
    {
        do {
            $code = strtoupper(Str::random(5));
        } while ($model->where('code', $code)->exists());

        return $code;
    }
}
