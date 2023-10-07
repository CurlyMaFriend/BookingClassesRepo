<?php

namespace App\Http\Requests\Bookings;

use App\Exceptions\CustomValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class BookingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * Get the validation error messages
     *
     * @return string REVER
     */
    public function messages()
    {
        return [
            'page.integer' => 'The page field must be an integer.',
            'startDate.date' => 'The start date must be a valid date.',
            'endDate.date' => 'The end date must be a valid date.',
            'endDate.after_or_equal' => 'The end date must be after or equal to the start date.',
            'personName.required' => 'The person name field is required.',
            'personName.string' => 'The person name must be a string.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date field must be a valid date.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new CustomValidationException($validator);
    }

}
