<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    /** @use HasFactory<\Database\Factories\CompaignFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'target_amount',
        'start_date',
        'end_date',
        'status',
    ];
}
