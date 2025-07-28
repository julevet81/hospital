<?php

namespace App\Models\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    
    public $timestamps = false;
    protected $fillable = ['name'];
}
