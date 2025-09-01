<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
     public function creator()
    { 
      return $this->belongsTo(User::class, 'created_by');
     }

     public function updater()
     {
      return $this->belongsTo(User::class, 'updated_by');
     }

     public function deleter()
     {
      return $this->belongsTo(User::class, 'deleted_by');
     }

    use HasFactory, Notifiable, SoftDeletes, Blameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id', 'timestamps'];
    protected $primaryKey = 'usr_id';
    protected $blameablePrefix = 'usr_';

    const CREATED_AT = 'usr_created_at';
    const UPDATED_AT = 'usr_updated_at';
    const DELETED_AT = 'usr_deleted_at';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}
