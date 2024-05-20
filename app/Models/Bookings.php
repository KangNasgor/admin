<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookings extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function photography_sessions(): HasMany
    {
        return $this->hasMany(Photography_sessions::class, 'bookings_id');
    }
    protected $fillable = [
        'customer_id',
        'photography_sessions_id',
        'booking_date',
        'booking_time',
        'status',
        'payment_status',
        'paket',
        'updated_at',
    ];
}
