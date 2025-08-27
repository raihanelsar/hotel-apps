<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'room_id',
        'reservation_number',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_status',
        'guest_id',
        'guest_qty',
        'guest_check_in',
        'guest_check_out',
        'guest_note',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
        'guest_room_number',
        'payment_method',
        'nights',
        'tax',
        'roomRate',
    ];
}
