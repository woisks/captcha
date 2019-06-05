<?php
declare(strict_types=1);

Route::prefix('captcha')
//     ->middleware('throttle:5,1')
     ->namespace('Woisks\Captcha\Http\Controllers')
     ->group(function () {
         Route::any('send', 'SendValidateCodeController@send');
     });