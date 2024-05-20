<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photography_sessions extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function photographer()
    {
        return $this->belongsTo(Photographers::class, 'photographer_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Bookings::class, 'bookings_id');
    }
    protected $fillable = [
        'photographer_id',
        'customer_id',
        'bookings_id',
        'start_time',
        'end_time',
        'price',
    ];
}
