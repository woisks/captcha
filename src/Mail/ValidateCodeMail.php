<?php
declare(strict_types=1);

namespace Woisks\Captcha\Mail;


use Illuminate\Mail\Mailable;


/**
 * Class ValidateCodeMail
 *
 * @package Woisks\Captcha\Mail
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/17 15:13
 */
class ValidateCodeMail extends Mailable
{
    /**
     * code  2019/5/17 15:13
     *
     * @var
     */
    public $name;
    public $code;

    /**
     * ValidateCodeMail constructor. 2019/5/17 15:13
     *
     * @param $name
     * @param $code
     *
     * @return void
     */
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }


    /**
     * build 2019/5/17 15:13
     *
     *
     * @return \Woisks\Captcha\Mail\ValidateCodeMail
     */
    public function build()
    {
        return $this->subject('[Woisk]验证码')->markdown('captcha::mails.code');
    }
}
