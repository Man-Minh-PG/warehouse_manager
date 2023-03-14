<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateunit_codesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        //note Authorize 
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }

    
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
