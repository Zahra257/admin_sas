<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organisationId',
        'email',
        'secondary_email',
        'city',
        'country',
        'phone',
        'secondary_phone',
        'website',
        'address',
        'segment',
        'active',
        'tax_id_1',
        'tax_id_2',
        'tax_id_3',
        'tax_id_4',
        'tax_id_5',
        'tax_id_6',
        'created_by',
        'updated_by'
    ];

    // Relationships
    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisationId');
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
