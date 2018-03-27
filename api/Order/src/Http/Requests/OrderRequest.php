<?php
/**
 * OrderRequest.php
 * Created by @anonymoussc on 03/26/2018 10:58 PM.
 */

namespace Api\Order\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'               => '',
            'reference'          => '',
            'contact'            => '',
            'type'               => 'required',
            'originName'         => '',
            'originAddress'      => 'required',
            'destinationName'    => '',
            'destinationAddress' => 'required',
            'userId'             => '',
        ];
    }
}