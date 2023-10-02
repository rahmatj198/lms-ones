<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_locations';  

    protected $fillable = ['city','address'];

    protected $hidden = ['created_at','created_by','updated_at','updated_by'];    
}
