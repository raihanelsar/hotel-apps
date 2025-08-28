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

    protected $append = ['isReserved_class', 'isReserved_text'];

    public function getIsReservedClassAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "badge text-bg-success";
                break;

            case '2':
                return "badge text-bg-secondary";
                break;

            default:
                return "badge text-bg-warning";
                break;
        }
    }
    public function getIsReservedTextAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "Confirm";
                break;

            case '2';
                return "Cancel";
                break;

            default:
                return "Pending";
                break;
        }
    }
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'id');
    }
}
