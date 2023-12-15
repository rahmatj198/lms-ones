<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_types';  

    protected $fillable = ['name','description'];

    protected $hidden = ['created_at','created_by','updated_at','updated_by'];    


    // relation with course
    public function courses()
    {
        return $this->hasMany(Course::class, 'type_id', 'id');
    }
}
