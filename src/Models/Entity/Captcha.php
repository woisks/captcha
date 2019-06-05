<?php
declare(strict_types=1);

namespace Woisks\Captcha\Models\Entity;


/**
 * Class CaptchaRepository
 *
 * @package Woisks\Captcha\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/10 11:47
 */
class Captcha extends Models
{

    public $timestamps = false;
    /**
     * table  2019/5/10 11:47
     *
     * @var string
     */
    protected $table = 'captcha';
    /**
     * fillable  2019/5/10 11:47
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'name',
        'code',
        'send_time',
        'expire_time',
        'status'
    ];
}
