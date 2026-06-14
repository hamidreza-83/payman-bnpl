<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'user_id',
        'website',
        'biz_name',
        'biz_type',
        'biz_sales',
        'owner_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
