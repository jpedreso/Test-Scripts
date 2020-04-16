<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'org_name', 'agency_type_id', 'tax_id', 'multi_company', 'cost_center_enable'
    ];
}