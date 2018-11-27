
@includeIf('blades.t11',[
    'test1'=>'lalallaa'
])

@component('alert',[
    'foo'=>'bar',
    'hell'=>2018,
    'name' => isset($name) ? $name : 'Default'  //模版中转传递给组件
])
    @slot('title')
        拒绝：
    @endslot

    {{--<strong>哇！</strong> 出现了一些问题！--}}
    你没有权限访问这个资源

    <p>当前时间：{{ date("Y-m-d h:i:s a", time())  }}</p>

    {{ $name or 'Default' }}

    {{  "<h3>Hello</h3>"  }}
    {!! "<h3>Hello</h3>"  !!}
    @{{ $name }}


    @verbatim
        {{ $name }}
        {{ $name }}
        {{ $name }}
        {{ $name }}
    @endverbatim
@endcomponent




@if ($records === 1)
    我有一条记录!
@elseif ($records > 1)
    我有多条记录！
@else
    我没有任何记录!
@endif

@unless($records)
    你尚未登录<br>
@endunless


@for ($i=0;$i<10;$i++)
    目前的值为{{ $i }}<br/>
@endfor

<hr/>



{{--{{dd($users)}}--}}

{{--{{ $users }}--}}

@foreach ($users as $user)
    <p>此用户为 {{ $user['name'] }}</p><br/>
@endforeach


<hr/>


@forelse ($users as $user)
    <li>{{ $user['name'] }}</li>
@empty
    <p>没有用户</p>
@endforelse

@while($sign)
    <p>我永远都在运行</p><br>
    {{sleep(2)}}
@endwhile

<hr/>

@foreach ($users as $user)
    @if ($user['id'] == 1)
        @continue
    @endif

    <li> {{ $user['name'] }}</li>

    @if ($user['id'] == 4)
        @break
    @endif
@endforeach


<hr/>

@foreach ($users as $user)
        @continue($user['id'] == 1)

    <li> {{ $user['name'] }}</li>

        @break($user['id'] == 4)
@endforeach



<hr/>


@foreach ($users as $user)
    @if ($loop->first)
        这是第一次迭代
    @endif
    <br>
    {{
    $loop->index
    .'---'.
    $loop->iteration
    .'---'.
    $loop->remaining
    .'---'.
    $loop->count
    .'---'.
    $loop->depth
    .'---'.
    $loop->parent
    }}

    @if ($loop->last)
        最后一次迭代循环
    @endif

    <p>当前用户 {{ $user['name'] }}</p>
@endforeach


{{-- 这是注释内容 --}}

<!-- 这也是注释内容 -->


@php
    for ($i=0;$i<10;$i++){
        echo "Hello World<br>";
    }
@endphp





















