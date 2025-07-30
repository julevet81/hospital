<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'phone',
        'price',
        'appointments', // Assuming 'appointments' is a translatable attribute
        'name', // Assuming 'name' is a translatable attribute
        'section_id',
        'is_active', // Added is_active field
    ];

    public $translatedAttributes = [
        'appointments', // Assuming 'appointments' is a translatable attribute
        'name', // Assuming 'name' is a translatable attribute
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
