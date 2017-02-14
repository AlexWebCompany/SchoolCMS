<?php
function contentcms($namedata,$content) {
$name=DB::table('pages')->where('id',$content)->value('name');
$view=DB::table('pages')->where('id',$content)->value('content');
if(DB::table('pages')->where('id',$content)->value('id')=='') {return(trans('page.no'));}
if ($namedata=='name') {return $name;}
if ($namedata=='content') {return $view;}
}
?>
@extends('layouts.app')
@section('content')
<?php $isname=1; ?>
<title>@lang('main.name') - {{contentcms('name',Route::input('page_id'))}}</title>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">{{contentcms('name',Route::input('page_id'))}}</div>
<div class="panel-body">
<p>{{contentcms('content',Route::input('page_id'))}}</p>
<?php
?>
</div>
</div>
</div>
</div>
</div>
@endsection