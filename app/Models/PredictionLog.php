<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PredictionLog extends Model
{
    /** @use HasFactory<\Database\Factories\PredictionLogFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'predicted_donation',
        'predicted_next_donation_date',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}