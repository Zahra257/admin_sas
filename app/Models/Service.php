<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'starting_date',
        'ending_date',
        'expired',
        'description',
        'organisationId',
        'account_id',
        'created_by',
        'updated_by',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisationId');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
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

