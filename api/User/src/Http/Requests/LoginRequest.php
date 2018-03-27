<?php
/**
 * LoginRequest.php
 * Created by @anonymoussc on 03/25/2018 9:34 PM.
 */

namespace Api\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone'    => 'required',
            'password' => 'required'
        ];
    }
}