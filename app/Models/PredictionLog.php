<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionLog extends Model
{
    /** @use HasFactory<\Database\Factories\PredictionLogFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'predicted_donation_amount', // Predicted donation value
        'predicted_donation_date', // Predicted next donation date
        'prediction_confidence', // Model confidence score (%)

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
