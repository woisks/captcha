<?php
declare(strict_types=1);


namespace Woisks\Captcha\Http\Requests;


class UsernameRequest extends Requests
{

    public function rules()
    {
        return [
            'username' => 'required|string|min:5|max:60'
        ];
    }
}
