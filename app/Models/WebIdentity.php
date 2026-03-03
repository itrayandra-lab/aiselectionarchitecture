<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebIdentity extends Model
{
    protected $table = 'web_identities';
    protected $fillable = [
        'web_name',
        'email',
        'domain',
        'phone_number',
        'facebook_link',
        'instagram_link',
        'youtube_link',
        'twitter_link',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'google_maps',
        'google_analytics_id',
        'google_tag_manager_id',
        'google_site_verification',
        'google_analytics_code',
        'google_tag_manager_head',
        'google_tag_manager_body',
        'facebook_pixel_id',
        'custom_head_scripts',
        'custom_body_scripts',
        'favicon',
        'logo',
        'status',
        'api_posts',
        'api_key_master',
        'version',
        'is_master',
    ];

    public $timestamps = true;

    protected $casts = [
        'status' => 'string',
        'is_master' => 'boolean',
    ];
}