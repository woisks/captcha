<?php
declare(strict_types=1);

Route::prefix('captcha')
     ->namespace('Woisks\Captcha\Http\Controllers')
     ->group(function () {
         Route::any('send', 'SendValidateCodeController@send')->middleware('throttle:2,1');
     });