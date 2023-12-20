<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letterTypes extends Model
{
    protected $fillable = [
        'letter_code',
        'name_type',
    ];

    public function letters()
    {
        return $this->hasMany(Letters::class, 'letter_type_id');
    }
}
