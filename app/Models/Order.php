<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model {
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'comment',
        'amount',
        'status',
    ];

    public const STATUSES = [
        0 => 'Новий',
        1 => 'Оброблений',
        2 => 'Оплачено',
        3 => 'Доставлено',
        4 => 'Завершено',
    ];


    public function getCreatedAtAttribute($value) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->timezone('Europe/Moscow');
    }


    public function getUpdatedAtAttribute($value) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->timezone('Europe/Moscow');
    }


    public function items() {
        return $this->hasMany(OrderItem::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }
}
