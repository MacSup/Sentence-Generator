<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'adverb' => 'required|string',
            'adjective' => 'required|string',
            'situation' => 'required|string',
            'objective' => 'required|string',
            'solution' => 'required|string',
            'snapshot' => 'required|string'
        ];
    }
}
