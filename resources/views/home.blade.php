@extends('layouts.app')
@section('title-block')Home Page @endsection
@section('content')
{{--    <h1>Home page</h1>--}}
{{--    <div class="container">--}}
{{--        fdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfds--}}
{{--        sssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfds--}}
{{--        sssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssss--}}
{{--        fdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssss--}}
{{--        fdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssss--}}
{{--        ssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdsssssssssssssssss--}}
{{--        sssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdssssssssssssssssssssfdsssssssssss--}}
{{--        sssssssss--}}
{{--    </div>--}}
<div class="container">
{{--    <home-component></home-component>--}}
    @if(Auth::user())
        @if($isExists == null)
            Заполните,пожалуйста, форму для отображения данных <a href="/fitness"><button class="btn btn-success">Перейти к заполнению формы</button></a>
        @else
            <fitness-profile-show-component user={{ Auth::user()->id }}></fitness-profile-show-component>
            <chart-line-component user={{ Auth::user()->id }}></chart-line-component>
            @endif

    @else
        <home-component></home-component>
        @endif
</div>
@endsection
