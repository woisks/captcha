<?php
declare(strict_types=1);


namespace Woisks\Captcha\Models\Traits;


use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\InvalidArgumentException;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

trait SMSCode
{
    public function sendSmsCode($phone, $code)
    {
        $sms = new EasySms(config('woisk.captcha.sms'));
        try {
            $sms->send($phone,
                [
                    'template' => 'SMS_85555094',
                    'data'     => [
                        'code' => $code
                    ]
                ]);
        } catch (InvalidArgumentException $e) {
            return;
        } catch (NoGatewayAvailableException $e) {
            return;
        }
    }
}
