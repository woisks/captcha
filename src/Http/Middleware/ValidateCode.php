<?php
declare(strict_types=1);


namespace Woisks\Captcha\Http\Middleware;


use Closure;
use Woisks\Captcha\Models\Traits\AuthValidateCode;

/**
 * Class ValidateCode
 *
 * @package Woisk\Captcha\Http\Middleware
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/16 11:23
 */
class ValidateCode
{
    use AuthValidateCode;

    /**
     * handle 2019/5/16 11:23
     *
     * @param          $request
     * @param \Closure $next
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        //判断需要验证码的Url


        //验证必须的参数

        //效验验证码

        //返回响应 或者 下放请求
        $name = $request->input('username');
        if (empty($name)) {
            return res(422, 'require username');
        }

        if (is_email($name) || is_phone($name)) {

            if (empty($request->input('code'))) {
                return res(422, 'require username and code');
            }

            $Code = $this->authCode($name, $request->input('code'));

            if (!is_null($Code)) {
                return $Code;
            }
        }

        return $next($request);

    }

}
