<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'introduction' => 'max:80',
            'email'        => 'required|email',
            'avatar'       => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
            'name'         => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => '用户名不能为空。',
            'name.unique'       => '用户名已被占用，请重新填写',
            'name.between'      => '用户名必须介于 3 - 25 个字符之间。',
            'name.regex'        => '用户名只支持英文、数字、横杠和下划线。',
            'avatar.dimensions' => '图片的清晰度不够，宽和高需要 208px 以上',
            'avatar.mimes'      =>'头像必须是 jpeg, bmp, png, gif 格式的图片',
        ];
    }
}
