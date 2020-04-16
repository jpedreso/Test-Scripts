<?php

namespace App\Model\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    protected $primaryKey = 'education_level_id';
    protected $table =  'educational_level';
    protected $guarded = [];
}