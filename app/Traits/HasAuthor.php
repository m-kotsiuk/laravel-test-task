<?php

namespace App\Traits;

use App\Models\User;

trait HasAuthor
{
    public function initializeHasAuthorTrait()
    {
        $this->fillable[] = 'admin_created_id';
        $this->fillable[] = 'admin_updated_id';
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->admin_created_id = auth()->id();
        });

        static::creating(function ($model) {
            $model->admin_created_id = auth()->id();
            $model->admin_updated_id = auth()->id();
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'admin_created_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'admin_updated_id');
    }
}
