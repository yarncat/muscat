<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
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
            'track_number' => 'required|array',
            'track_number.*' => 'required|integer|min:1|distinct',
            'track_title' => 'required|array',
            'track_title.*' => 'required|max:255',
            'duration' => 'required|array',
            'duration.*' => 'required|regex:/[0-9]{1,2}:[0-9]{2}/'
        ];
    }
}
