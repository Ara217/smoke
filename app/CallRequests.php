<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallRequests extends Model
{
    protected $table = 'call_requests';
    protected $fillable = ['name', 'phoneNumber'];
}
