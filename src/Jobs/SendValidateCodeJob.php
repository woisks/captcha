<?php
declare(strict_types=1);


namespace Woisks\Captcha\Jobs;


use Illuminate\Contracts\Queue\ShouldQueue;
use Woisks\Captcha\Mail\ValidateCodeMail;
use Woisks\Captcha\Models\Repository\CaptchaRepository;
use Woisks\Captcha\Models\Traits\SMSCode;

/**
 * Class SendValidateCodeJob
 *
 * @package Woisks\Captcha\Jobs
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/17 11:16
 */
class SendValidateCodeJob implements ShouldQueue
{

    public  $tries =2;
    /**
     * type  2019/5/17 11:16
     *
     * @var  string
     */
    public $type;
    use SMSCode;
    /**
     * name  2019/5/17 11:16
     *
     * @var  string
     */
    public $name;
    /**
     * code  2019/5/17 11:16
     *
     * @var  int
     */
    public $code;

    /**
     * SendValidateCodeJob constructor. 2019/5/17 11:16
     *
     * @param string $type
     * @param string $name
     * @param int    $code
     *
     * @return void
     */
    public function __construct(string $type, string $name, int $code)
    {
        $this->type = $type;
        $this->name = $name;
        $this->code = $code;
    }

    public function retryUntil()
    {
        return now()->addSeconds(5);
    }

    /**
     * handle 2019/5/17 11:18
     *
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->type) {
            case 'email':
                $this->sendEmail($this->name, $this->code);
                break;
            case 'sms':
                $this->SendSMS($this->name, $this->code);
                break;
            default:
        }
    }

    /**
     * sendEmail 2019/5/17 9:14
     *
     * @param $name
     * @param $code
     *
     * @return void
     */
    private function sendEmail($name, $code)
    {

        $this->saveCode($name, $code);

        \Mail::to($name)->send(new ValidateCodeMail($name,$code));

    }

    /**
     * saveCode 2019/5/17 11:18
     *
     * @param string $name
     * @param int    $code
     *
     * @return object
     */
    private function saveCode(string $name, int $code)
    {
        return app(CaptchaRepository::class)->created($name, $code);
    }

    /**
     * SendSMS 2019/5/17 9:14
     *
     * @param $name
     * @param $code
     *
     * @return void
     */
    private function SendSMS($name, $code)
    {

        $this->saveCode($name, $code);

        if (!\App::environment('local')) {

            $this->sendSmsCode($name, $code);
        }

        \Log::info('validate', [$name, $code]);
    }
}
