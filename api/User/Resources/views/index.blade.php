@extends('user::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from component: {!! config('user.name') !!}
    </p>
@stop
