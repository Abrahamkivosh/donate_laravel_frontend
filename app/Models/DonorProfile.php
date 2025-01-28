<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonorProfile extends Model
{
    /** @use HasFactory<\Database\Factories\DonorProfileFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_donations', // Total number of donations made
        'total_amount', //Total donation amount contributed
        'avg_donation', //Average donation amount per transaction
        'frequency', //How often the donor contributes (in months)
        'last_donation_date', // Date of the last donation made
        'preferred_payment_method' //Preferred payment method
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
