<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['company', 'start_date', 'end_date', 'description', 'imgexp'];
}
