<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Intercambio extends Model
{
    protected $fillable = [
        'name',
        'vacancies',
        'destination',
        'registration_period_start_date',
        'registration_period_end_date',
        'exchange_period_start_date',
        'exchange_period_end_date',
        'description',
        'edital',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}