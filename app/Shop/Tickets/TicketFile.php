<?php

namespace App\Shop\Tickets;

use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    protected $table = 'ticket_file';
    protected $fillable = [
        'ticket_history_id',
        'file_path',
    ];
}
