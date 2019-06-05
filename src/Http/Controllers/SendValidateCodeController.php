<?php
declare(strict_types=1);


namespace Woisks\Captcha\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Woisks\Captcha\Http\Requests\UsernameRequest;
use Woisks\Captcha\Models\Traits\SendValidateCode;

/**
 * Class SendValidateCodeController
 *
 * @package Woisks\Captcha\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/5 8:59
 */
class SendValidateCodeController extends BaseController
{
    use SendValidateCode;


    /**
     * send 2019/6/5 8:59
     *
     * @param \Woisks\Captcha\Http\Requests\UsernameRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(UsernameRequest $request):JsonResponse
    {
        return $this->sendService($request->input('username'));
    }

}