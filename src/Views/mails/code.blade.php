@component('mail::message')

亲爱的用户:你好!

@component('mail::button', ['url' =>config('app.url')])

验证码：{{$code}}<br>

@endcomponent

@component('mail::panel')
温馨提示：验证码有效期为 20 分钟，如若不是本人操作请无视。
@endcomponent

Thanks,<br>
{{config('app.url')}} 团队敬上<br>
祝您生活愉快，工作顺利！<br>

@endcomponent