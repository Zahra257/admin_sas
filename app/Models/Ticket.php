<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['description', 
                            'type', 
                            'ip_address', 
                            'subject', 
                            'priority', 
                            'status',
                            'closing_date',
                            'opening_date',
                            'organisationId' ,
                            'accontId' ,
                            'serviceId' ,
                            'assigned_to' ,
                            'created_by',
                             'updated_by'];

                             public function organization()
                             {
                                 return $this->belongsTo(Organisation::class, 'organisationId'); // Assuming the foreign key is `organisationId`
                             } 
                             public function service()
                             {
                                 return $this->belongsTo(Service::class, 'serviceId'); // Assuming the foreign key is `serviceId `
                             } 
                          
                            public function listdetailsticket()
                            {
                                return $this->hasMany(ticketsDetails::class , 'ticketId'); // Assuming the foreign key is `organisationId`
                            }
                             public function operator()
                             {
                                 return $this->belongsTo(User::class, 'assigned_to');
                             }
                             public function creator()
                             {
                                 return $this->belongsTo(User::class, 'created_by');
                             }
                         
                             public function updater()
                             {
                                 return $this->belongsTo(User::class, 'updated_by');
                             }

}
