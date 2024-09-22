<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaunaFacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'postal_code' => 'required',
            'prefecture' => 'required',
            'city' => 'required',
            'access' => 'required',
            'price' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'saunaComment' => 'required',
            'hasLoyly' => 'required',
            'loylyComment' => 'required',
            'hasWaterbath' => 'required',
            'waterbathComment' => 'required',
            'hasOutdoorbath' => 'required',
            'hasChair' => 'required',
            'chairComment' => 'required',
        ];
    }
}
