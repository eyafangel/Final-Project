<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FastEventRequest extends FormRequest
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
            'title' => 'required|min:3',
            'start' => 'date_format:H:i:s|before:end',
            'end' => 'date_format:H:i:s|after:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field required!',
            'title.min' => 'Appointment title must be atleast 3 characters!',
            'start.date_format' => 'Fill in the Start Date with a valid date!',
            'start.before' => 'Start Date/Time must be lesss than the End Date!',
            'end.date_format' => 'Fill in the End Date/Time with a valid date!',
            'end.after' => 'End date must be greater than the start date!',
        ];
    }
}
