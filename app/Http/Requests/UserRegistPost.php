<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return false;
        return true; // 요청 취득을 기준으로 확인하므로 실행 허가로 변경
    }

    public function messages()
    {
        return [
            'name.required' => '이름을 입력해 주십시오',
            'name.max' => '이름은 최대 20문자까지 입력할 수 있습니다',
            'email.required' => '메일주소를 입력해 주십시오',
            'email.email' => '메일주소 형식이 올바르지 않습니다',
            'email.max' => '메일주소는 최대 255문자까지 입력할 수 있습니다',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
        ];
    }
}
