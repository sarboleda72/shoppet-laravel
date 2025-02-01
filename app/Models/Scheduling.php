<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Scheduling extends Model
{
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'price',
        'description',
        'appoitment',
        'branch'
    ];

    public function pet(){
        return $this->hasMany('App\Models\pet');
    }

    public function user(){
        return $this->hasMany('App\Models\user');
    }

}
