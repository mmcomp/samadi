<?php

namespace App\Shop\Tickets;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'subject',
        'content',
        'customers_id',
        'employees_id',
        'status',
        'unit',
        'answer',
    ];
}
