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
            'name' => 'required|max:255',
            'postal_code' => 'required',
            'prefecture' => 'required|max:6',
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
            'sauna_type' => 'required|array',
            'sauna_type.*' => 'required|integer|in:1,2,3,4',//1,2,3,4という値の入力しか受け付けない
            'temperature' => 'required|array',
            'temperature.*' => 'required|string|max:40',
            'note' => 'required|array',
            'note.*' => 'required|string',
        ];
    }
}
