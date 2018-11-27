@component('mail::message')
# 介绍

测试 Laravel 发送邮件功能

@component('mail::button', ['url' => 'test.com', 'color' => 'blue'])
点击
@endcomponent

@component('mail::panel')
这是面板
@endcomponent

@component('mail::table')
| Laravel | Table | Example |
|---------:|-------:|---------:|
| Col 2 is | Centered | $10 |
| Col 3 is | Right-Aligned | $20 |
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent
