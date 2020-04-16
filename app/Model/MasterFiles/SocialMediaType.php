<?php

namespace App\Model\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class SocialMediaType extends Model
{
    protected $primaryKey = 'social_media_type_id';
    protected $table =  'social_media_type';
    protected $guarded = [];
}