<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketsDetails extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'ticketId', 'organisationId', 'accontId', 'created_by',  'updated_by'];
   
    public function creatormsg()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatermsg()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
