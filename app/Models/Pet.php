<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
     
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'type',
        'breed',
        'size'
    ];

    public function scheduling(){
        return $this->belongsTo('App\Models\Scheduling');
    }

    public function scopeNames($users, $query)
    {
        if (trim($query)) {
            $users->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('type', 'LIKE', '%' . $query . '%');
        }
    }

}
