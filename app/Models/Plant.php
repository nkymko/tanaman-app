<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
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
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'uniqid';
    }

    /**
     * Get the category of plants
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

     /**
     * Get the location of plants
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
