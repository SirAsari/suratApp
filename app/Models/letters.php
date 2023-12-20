<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letters extends Model
{
    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attachment',
    ];

    public function letter_type()
    {
        return $this->belongsTo(LetterTypes::class, 'letter_type_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'letter_recipients', 'letter_id', 'user_id');
    }
    public function notulis()
    {
        return $this->belongsTo(User::class, 'notulis_id');
    }
}
