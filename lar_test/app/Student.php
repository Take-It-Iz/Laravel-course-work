<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'group_id',
    ];

    public function group() {
        return $this->belongsTo(
            Group::class,
            'group_id',
            'id'
        );
    }
}