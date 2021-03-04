<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Employee extends Model
{
    use HasFactory, NodeTrait, HasAuthor;

    protected $fillable = [
        'name',
        'position_id',
        'employment_date',
        'phone_number',
        'email',
        'salary',
        'photo'
    ];

    protected $casts = [
        'employment_date' => 'date'
    ];
}
