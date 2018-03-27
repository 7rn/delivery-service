<?php
/**
 * UserRegisterRequest.php
 * Created by @anonymoussc on 03/26/2018 9:12 PM.
 */

namespace Api\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => '',
            'email'    => '',
            'phone'    => 'required',
            'password' => 'required',
        ];
    }
}