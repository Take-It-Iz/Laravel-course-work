<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];
    
    public function student() {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'id'
        );
    }

    public function students() {
        return $this->hasMany(
            Student::class,
            'group_id',
            'id'
        );
    }

}
