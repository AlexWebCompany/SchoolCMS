@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.dash')</div>
                <div class="panel-body">
                    @lang('auth.hello')
                    <a href="{{ url('/admin') }}" class="btn btn-primary">@lang('auth.dash') @lang('main.cmsname')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
