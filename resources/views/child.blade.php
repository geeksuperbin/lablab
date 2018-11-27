@extends('layouts.app')


@section('title','Blade 模版引擎测试')

@section('sidebar')
    @parent
    <p>继承模板的侧边栏</p>
@endsection


@section('content')
    <p>这是内容区</p>
@endsection