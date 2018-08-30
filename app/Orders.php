<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name', 'phone', 'order', 'address'];

    public function getOrderAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = json_encode($value);
    }
}
