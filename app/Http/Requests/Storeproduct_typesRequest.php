<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeproduct_typesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        // Note authorsize
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // Let's add a few validation rules
            'name' => 'required|string|max:255'
        ];
    }

     /**
     * Custom messeage validation.  
     *
     * @return array<string, mixed>
     */
    public function message()
    {
        return [
            // Custom comment
            'name.max'      => 'Tên của loại phải nhỏ hơn 225 ký tự',
            'name.required' => config('messagescommon.message.required') ,
            'name.string'   => 'Tên của loại bắt buộc phải là chữ cái'  
        ];
    }
}
