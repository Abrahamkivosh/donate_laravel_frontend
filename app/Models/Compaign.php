<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'status', // true or false
    ];



    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'compaign_user')
            ->withTimestamps();
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'target_amount' => 'decimal:2',
            'status' => 'boolean',
        ];
    }
}
