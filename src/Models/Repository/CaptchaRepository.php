<?php
declare(strict_types=1);

namespace Woisks\Captcha\Models\Repository;

use Carbon\Carbon;
use Woisks\Captcha\Models\Entity\Captcha;


/**
 * Class CaptchaRepository
 *
 * @package Woisks\Captcha\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/10 11:55
 */
class CaptchaRepository
{


    /**
     * model  2019/5/10 11:55
     *
     * @var static \Woisks\Captcha\Models\Entity\CaptchaRepository
     */
    private static $model;


    /**
     * CaptchaRepository constructor. 2019/5/14 10:28
     *
     * @param \Woisks\Captcha\Models\Entity\Captcha $captcha
     *
     * @return void
     */
    public function __construct(Captcha $captcha)
    {
        self::$model = $captcha;
    }


    /**
     * todaySendCount 2019/5/16 13:58
     *
     * @param string $name
     *
     * @return int
     */
    public function todaySendCount(string $name): int
    {
        return self::$model->where('name', $name)
                           ->where('send_time', '>', Carbon::today()->timestamp)
                           ->where('status', 0)
                           ->count();
    }

    /**
     * nameCodeFirst 2019/6/4 20:15
     *
     * @param string $name
     * @param string $code
     *
     * @return mixed
     */
    public function nameCodeFirst(string $name, string $code)
    {
        return self::$model->where('name', $name)
                           ->where('code', $code)
                           ->where('status', 0)
                           ->first();
    }

    /**
     * created 2019/5/14 10:40
     *
     * @param string $name
     * @param int    $code
     * @param int    $minute
     *
     * @return mixed
     */
    public function created(string $name, int $code, int $minute = 20)
    {
        return self::$model->create([
            'id'          => create_numeric_id(),
            'type'        => account_type($name),
            'name'        => $name,
            'code'        => $code,
            'send_time'   => Carbon::now()->timestamp,
            'expire_time' => Carbon::now()->addMinute(20)->timestamp
        ]);
    }

}
