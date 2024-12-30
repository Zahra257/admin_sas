<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'organisationId',
        'active',
        'phone',
        'birthday',
        'created_by',
        'updated_by',
        'imageUrl',

    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
     //one to many : one superadmin has many orgs
     public function organisations()
     {
        return $this->hasMany(Organisation::class, 'created_by');
     }

     public function accountId()
     {
        return $this->belongsTo(Account::class, 'account_id'); // Assuming the foreign key is `organisationId`
     }
     //many user has one organisation 
     public function organization()
     {
        return $this->belongsTo(Organisation::class, 'organisationId'); // Assuming the foreign key is `organisationId`
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
