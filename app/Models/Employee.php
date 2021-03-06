<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Employee extends Model
{
    use HasFactory, HasAuthor, NodeTrait;

    protected $fillable = [
        'name',
        'position_id',
        'employment_date',
        'phone_number',
        'email',
        'salary',
        'photo',
        'node_depth',
        'parent_id'
    ];

    protected $casts = [
        'employment_date' => 'date'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
