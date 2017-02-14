<script type="text/javascript">
function Selected(a) {
var label = a.value;
if (label=="mysql") {
document.getElementById("mysqldata").style.display='block';
document.getElementById("pgsqldata").style.display='none';
document.getElementById("sqlitedata").style.display='none';
} else if (label=="pgsql") {
document.getElementById("mysqldata").style.display='none';
document.getElementById("pgsqldata").style.display='block';
document.getElementById("sqlitedata").style.display='none';
} else if (label=="sqlite") {
document.getElementById("mysqldata").style.display='none';
document.getElementById("pgsqldata").style.display='none';
document.getElementById("sqlitedata").style.display='block';
} else {
document.getElementById("mysqldata").style.display='none';
document.getElementById("pgsqldata").style.display='none';
document.getElementById("sqlitedata").style.display='none';
}
}
</script>
<?php
class Helper_TimeZone
{
    public static function getTimeZoneSelect($selectedZone = NULL)
    {
        $regions = array(
            'Africa' => DateTimeZone::AFRICA,
            'America' => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Aisa' => DateTimeZone::ASIA,
            'Atlantic' => DateTimeZone::ATLANTIC,
            'Europe' => DateTimeZone::EUROPE,
            'Indian' => DateTimeZone::INDIAN,
            'Pacific' => DateTimeZone::PACIFIC
        );
 
        $structure ='<div class="form-group">';
		$structure .= '<label class="col-md-4 control-label">'.trans('config.time').': </label>';
		$structure .= '<div class="col-md-6">';
		$structure .= '<select name="utc" class="form-control">';
        $structure .= '<option value="">'.trans('config.changetime').'</option>';
 
        foreach ($regions as $mask) {
            $zones = DateTimeZone::listIdentifiers($mask);
            $zones = self::prepareZones($zones);
 
            foreach ($zones as $zone) {
                $continent = $zone['continent'];
                $city = $zone['city'];
                $subcity = $zone['subcity'];
                $p = $zone['p'];
                $timeZone = $zone['time_zone'];
 
                if (!isset($selectContinent)) {
                    $structure .= '<optgroup label="'.$continent.'">';
                }
                elseif ($selectContinent != $continent) {
                    $structure .= '</optgroup><optgroup label="'.$continent.'">';
                }
 
                if ($city) {
                    if ($subcity) {
                        $city = $city . '/'. $subcity;
                    }
 
                    $structure .= "<option ".(($timeZone == $selectedZone) ? 'selected="selected "':'') . " value=\"".($timeZone)."\">(".$p. " UTC) " .str_replace('_',' ',$city)."</option>";
                }
 
                $selectContinent = $continent;
            }
        }
 
        $structure .= '</optgroup></select>';
		$structure .='</div>';
		$structure .='</div>';
 
        return $structure;
    }
 
    private static function prepareZones(array $timeZones)
    {
        $list = array();
        foreach ($timeZones as $zone) {
            $time = new DateTime(NULL, new DateTimeZone($zone));
            $p = $time->format('P');
            if ($p > 13) {
                continue;
            }
            $parts = explode('/', $zone);
 
            $list[$time->format('P')][] = array(
                'time_zone' => $zone,
                'continent' => isset($parts[0]) ? $parts[0] : '',
                'city' => isset($parts[1]) ? $parts[1] : '',
                'subcity' => isset($parts[2]) ? $parts[2] : '',
                'p' => $p,
            );
        }
 
        ksort($list, SORT_NUMERIC);
 
        $zones = array();
        foreach ($list as $grouped) {
            $zones = array_merge($zones, $grouped);
        }
 
        return $zones;
    }
}
?>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.dash') @lang('main.cmsname')</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/admin/apply"@if (config('app.getpost')==true) method="post" @endif>
                    @if (config('app.getpost')==true) {{ csrf_field() }} @endif
                    <p><input type="hidden" name="url" value="{{ $_SERVER['REQUEST_URI'] }}"></p>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.namesite'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.namesite')" name="namesite" value="{{ config('app.origname') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.urlsite'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.urlsite')" name="url_site" value="{{ config('app.url') }}" class="form-control">
					</div>
					</div>
					<?=Helper_TimeZone::getTimeZoneSelect(config('app.timezone'));?>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.lang'): </label>
					<div class="col-md-6">
					<select size="1" name="lang" class="form-control">>
                    <option value="">@lang('config.chooselang')</option>
                    <option value="ru"@if (config('app.locale')=='ru') selected @endif>@lang('config.ru')</option>
                    <option value="en"@if (config('app.locale')=='en') selected @endif>@lang('config.en')</option>
                    </select>
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.nameru'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.nameru')" name="runame" value="{{ config('app.runame') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.nameen'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.nameen')" name="enname" value="{{ config('app.enname') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.db'): </label>
					<div class="col-md-6">
					<select id="sql" size="1" name="sql" onChange="Selected(this)" class="form-control">
                    <option value="no">@lang('config.choosedb')</option>
                    <option value="mysql"@if (config('database.default')=='mysql') selected @endif>@lang('config.mysql')</option>
                    <option value="pgsql"@if (config('database.default')=='pgsql') selected @endif>@lang('config.pgsql')</option>
                    <option value="sqlite"@if (config('database.default')=='sqlite') selected @endif>@lang('config.sqlite')</option>
                    </select>
					</div>
					</div>
                    <div id="mysqldata" @if (config('database.default')!='mysql') style="display: none;" @endif>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.host'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.host')" name="mysqlhost" value="{{ config('database.connections.mysql.host') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.port'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.port')" name="mysqlport" value="{{ config('database.connections.mysql.port') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.user'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.user')" name="mysqluser" value="{{ config('database.connections.mysql.username') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.basedata'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.basedata')" name="mysqlbase" value="{{ config('database.connections.mysql.database') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.password'): </label>
					<div class="col-md-6">
					<input type="password" placeholder="@lang('config.password')" name="mysqlpass" value="{{ config('database.connections.mysql.password') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.prefix'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.prefix')" name="mysqlprefix" value="{{ config('database.connections.mysql.prefix') }}" class="form-control">
					</div>
					</div>
                    </div>
                    <div id="pgsqldata" @if (config('database.default')!='pgsql') style="display: none;" @endif>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.host'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.host')" name="pgsqlhost" value="{{ config('database.connections.pgsql.host') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.port'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.port')" name="pgsqlport" value="{{ config('database.connections.pgsql.port') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.user'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.user')" name="pgsqluser" value="{{ config('database.connections.pgsql.username') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.basedata'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.basedata')" name="pgsqlbase" value="{{ config('database.connections.pgsql.database') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.password'): </label>
					<div class="col-md-6">
					<input type="password" placeholder="@lang('config.password')" name="pgsqlpass" value="{{ config('database.connections.pgsql.password') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.prefix'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.prefix')" name="pgsqlprefix" value="{{ config('database.connections.pgsql.prefix') }}" class="form-control">
					</div>
					</div>
                    </div>
                    <div id="sqlitedata" @if (config('database.default')!='sqlite') style="display: none;" @endif>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.basedata'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.basedata')" name="sqlitebase" value="{{ config('database.connections.sqlite.databaseconfig') }}" class="form-control">
					</div>
					</div>
                    <div class="form-group">
					<label class="col-md-4 control-label">@lang('config.prefix'): </label>
					<div class="col-md-6">
					<input type="text" placeholder="@lang('config.prefix')" name="sqliteprefix" value="{{ config('database.connections.sqlite.prefix') }}" class="form-control">
					</div>
					</div>
                    </div>
                    <p><input type="checkbox" name="debug" value="true"@if (config('app.debug')==true) checked @endif>@lang('config.ondebug')</p>
                    <p><input type="checkbox" name="cache" value="true"@if (config('app.cache')==true) checked @endif>@lang('config.oncache')</p>
                    <p><input type="checkbox" name="getpost" value="true"@if (config('app.getpost')==true) checked @endif>@lang('config.ongetpost')</p>
                    <p><input type="submit" value="@lang('main.apply')" class="btn btn-primary"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
