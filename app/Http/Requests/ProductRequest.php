<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        $rules =  ['name' => 'min:3|required',
            'calories' => 'required|numeric',
            'proteins' => 'required|numeric',
            'fats' => 'required|numeric',
            'carbohydrates' => 'required|numeric'
        ];
        if($this->route()->named('product.update') === false)
        {
            $rules['name'] = '|unique:products,name';
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'calories.required' => 'Поле Калории обязательно для заполнения',
            'proteins.required' => 'Поле Белки обязательно для заполнения',
            'fats.required' => 'Поле Жиры обязательно для заполнения',
            'carbohydrates.required' => 'Поле Углеводы обязательно для заполнения',
            'name.unique' => 'Такой продукт уже существует'
        ];
    }
}
