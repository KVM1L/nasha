<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'tags',
        'cover',
        'video',
        'video_mobile',
        'text',
        'description',
        'photo_1',
        'photo_2',
        'video_1',
        'video_2',
        'footer_photo',
    ];

    public $translatable = [
        'title',
        'tags',
        'text',
        'description',
    ];
}
