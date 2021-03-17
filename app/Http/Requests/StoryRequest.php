<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'adverb' => 'required|exists:adverbs,id',
            'adjective' => 'required|exists:adjectives,id',
            'situation' => 'required|exists:situations,id',
            'complement'=> 'required/exists:complements, id',
            'objective' => 'required|exists:objectives,id',
            'solution' => 'required|exists:solutions,id',
            'snapshot' => 'required|image'
        ];
    }
}
