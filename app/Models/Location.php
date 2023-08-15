<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Eager Loading
     *
     * @var array<int, string>
     */
    protected $with = [
        'plants',
    ];

    public function plants(): HasMany
    {
        return $this->hasMany(Plant::class);
    }
}
