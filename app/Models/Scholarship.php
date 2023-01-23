<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Scholarship extends Model
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'value', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
