<?php
declare(strict_types=1);


namespace Woisks\Captcha\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


/**
 * Class Requests
 *
 * @package Woisks\Captcha\Http\Requests
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/4 20:07
 */
abstract class Requests extends FormRequest
{


    /**
     * authorize 2019/5/10 11:45
     *
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * rules 2019/5/10 11:45
     *
     *
     * @return mixed
     */
    abstract public function rules();
}
