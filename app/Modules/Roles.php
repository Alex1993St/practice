<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['role'];
    protected $guarded = [];
}
