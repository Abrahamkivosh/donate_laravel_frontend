<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'donation_date',
        'compaign_id',
    ];

    protected $casts = [
        'donation_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function compaign()
    {
        return $this->belongsTo(Compaign::class);
    }
}
