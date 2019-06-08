<?php
declare(strict_types=1);


namespace Woisks\Captcha\Models\Traits;


use Illuminate\Http\JsonResponse;
use Woisks\Captcha\Jobs\SendValidateCodeJob;
use Woisks\Captcha\Models\Repository\CaptchaRepository;

/**
 * Trait SendValidateCode
 *
 * @package Woisks\Captcha\Models\Traits
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/16 12:04
 */
trait SendValidateCode
{

    /**
     * sendService 2019/5/16 12:04
     *
     * @param string $emailOrPhone
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendService(string $emailOrPhone): JsonResponse
    {
        if (is_phone($emailOrPhone)) {
            return $this->sendJob('sms', $emailOrPhone);
        }

        if (is_email_and_check_dns($emailOrPhone)) {
            return $this->sendJob('email', $emailOrPhone);
        }

        return res(422, 'require proper email or china phone');
    }


    /**
     * send 2019/5/17 11:34
     *
     * @param string $type
     * @param string $name
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function sendJob(string $type, string $name): JsonResponse
    {
        $check = $this->checkToDayCodeNumeric($name);
        if (!is_null($check)) {
            return $check;
        }

        dispatch(new SendValidateCodeJob($type, $name, random_numeric(6)));

        return res(200, 'success');
    }


    /**
     * checkToDayCodeNumeric 2019/5/17 11:34
     *
     * @param string $name
     *
     * @return null|\Illuminate\Http\JsonResponse
     */
    private function checkToDayCodeNumeric(string $name): ?JsonResponse
    {
        $int = app(CaptchaRepository::class)->todaySendCount($name);

        if ($int >= 2) {
            return res(419, 'today validator code excess');
        }

        return null;
    }


}
