<?php

namespace App\Helpers;

use App\Models\Setting;

class SocialLinksHelper
{
    public static function getSocialLinks()
    {
        return [
            'tg' => Setting::where('key', 'telegram')->value('value'),
            'inst' => Setting::where('key', 'instagram')->value('value'),
            'wp' => Setting::where('key', 'whatsapp')->value('value'),
        ];
    }
}
