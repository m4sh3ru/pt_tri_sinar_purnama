<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelProgress extends Model
{
    protected $table = "level_progress";
    protected $fillable = ['progress'];

    public $timestamps = false;
}
