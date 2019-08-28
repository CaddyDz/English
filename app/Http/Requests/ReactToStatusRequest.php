<?php

namespace English\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReactToStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reaction_type' => 'bail|required|in:like,dislike,love,hate,angry,haha,wow',
        ];
    }
}
