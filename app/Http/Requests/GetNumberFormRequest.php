<?php

namespace App\Http\Requests;

use App\DTO\GetNumberDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetNumberFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required'],
            'service' => ['required', 'string', 'max:10'],
            'rent_time' => ['int'],
        ];
    }

    public function getDTO(): GetNumberDTO
    {
        return new GetNumberDTO(
            country: $this->validated('country'),
            service: $this->validated('service'),
        );
    }
}
