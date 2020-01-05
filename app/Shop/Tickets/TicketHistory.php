<?php

namespace App\Shop\Tickets;

use Illuminate\Database\Eloquent\Model;
use App\Shop\Employees\Employee;

class TicketHistory extends Model
{
    protected $table = 'ticket_history';
    protected $fillable = [
        'ticket_id',
        'employee_id',
        'answer',
    ];
}
