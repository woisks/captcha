<?php
declare(strict_types=1);


namespace Woisks\Captcha\Models\Traits;


use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Woisks\Captcha\Models\Repository\CaptchaRepository;

/**
 * Trait AuthValidateCode
 *
 * @package Woisks\Captcha\Models\Traits
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/17 11:53
 */
trait AuthValidateCode
{
    /**
     * authCode 2019/5/17 11:53
     *
     * @param string $name
     * @param string $code
     *
     * @return null|\Illuminate\Http\JsonResponse
     */
    public function authCode(string $name, string $code): ?JsonResponse
    {
        $db = app(CaptchaRepository::class)->nameCodeFirst($name, $code);

        //$db=null or expire_time=false
        if (!$db) {
            return res(422, 'name or code error');
        }
        if (Carbon::now()->timestamp > $db->expire_time) {
            return res(422, 'code expired');
        }

        //更改状态
        $db->status = 1;
        $db->save();

        return null;
    }
}
