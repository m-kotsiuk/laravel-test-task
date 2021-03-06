<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function rules(): array
    {
        $position = $this->route('position');

        $positionId = isset($position) ? $position->id : null;

        return [
            'name' => 'required|unique:positions,name,' .  $positionId. ',id|min:3|max:255'
        ];
    }
}
