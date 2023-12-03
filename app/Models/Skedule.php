<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skedule extends Model
{
    
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *	
     * @var array

     */
    protected $fillable = [
        'event_name','starting','destination','starthrs','end_hrs'
    ];
}
