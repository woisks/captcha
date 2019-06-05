<?php
declare(strict_types=1);
/*
 * +----------------------------------------------------------------------+
 * |                   At all timesI love the moment                      |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2019 www.Woisk.com All rights reserved.                |
 * +----------------------------------------------------------------------+
 * |  Author:  Maple Grove  <bolelin@126.com>   QQ:364956690   286013629  |
 * +----------------------------------------------------------------------+
 */

namespace Woisks\Captcha\Models\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Model
 *
 * @package Woisks\Captcha\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/5/10 11:48
 */
class Models extends Model
{

    /**
     * incrementing  2019/5/22 22:36
     *
     * @var  bool
     */
    public    $incrementing = false;
    /**
     * dateFormat  2019/6/4 20:05
     *
     * @var  string
     */
    protected $dateFormat ='U';
}
