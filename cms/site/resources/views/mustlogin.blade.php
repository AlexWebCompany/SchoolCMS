<?php $isname=1; ?>
@extends('layouts.app')
@section('content')
<title>@lang('main.name') - @lang('error.mustlogin')</title>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                @lang('main.mustlogin') <a href="{{ url('/login?url='.$_SERVER['REQUEST_URI']) }}" class="btn btn-primary">@lang('auth.login')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection