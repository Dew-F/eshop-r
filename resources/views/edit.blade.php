@extends('layouts.base')

@section('title', 'Редактирование')

@section('content')
	<div class="edit b">
		<span class="title">{{ $_GET['tableName'] }}</span>
		<form method="post" action="{{route('save')}}" class="table">
			@csrf
			<input type="hidden" name="tableName" value="{{ $_GET['tableName'] }}">
			<table>
			@if ($_GET['ID'] != '')
				@foreach ($rows as $key=>$value)
					@if ($key != "ID" && $key != "id")
						@if (preg_match("/ID$/",$key) && $key != "ID" && $key != "SessionID" || $key == "user_id")
							@if ($key != "user_id")
								@php
									$foreign = substr($key, 0, -2);
									$foreign = lcfirst($foreign);
									if (substr($foreign, -1) == 'y') {
										$foreign = substr($foreign,0,-1).'ies'; 
									} else {
										$foreign = $foreign.'s';
									}
									$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
								@endphp
							@else
								@php
									$foreign = "users";
									$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
								@endphp
							@endif
							@if ($name != '')
							<tr>
								<td><label for="{{$key}}">{{$key}}</label></td>
								<td><select name="{{$key}}" required>
									@foreach (DB::table($foreign)->get() as $row)
										@if ($row->ID == $value)
											<option value="{{$row->ID}}" selected>{{$row->Name}}</option>
										@else
											<option value="{{$row->ID}}">{{$row->Name}}</option>
										@endif
									@endforeach
								</select></td>
							</tr>
							@else
								<tr>
								<td><label for="{{$key}}">{{$key}}</label></td>
								<td><select name="{{$key}}" required>
									@foreach (DB::table($foreign)->get() as $row)
										@if ($row->ID == $value)
											<option value="{{$row->ID}}" selected>{{$row->ID}}</option>
										@else
											<option value="{{$row->ID}}">{{$row->ID}}</option>
										@endif
									@endforeach
								</select></td>
							</tr>
							@endif
						@elseif ($table_info->where('Field', $key)->first()->Type == "timestamp")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="datetime-local" name="{{$key}}" value="{{str_replace(' ', 'T', $value)}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "int")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="1" name="{{$key}}" min=0 value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "double(8,2)")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="any" min=0 name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "tinyint(1)")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="1" min=0 max=1 name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@else
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="text" name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@endif
					@else
						<input type="hidden" name="ID" value="{{$value}}">
						<input type="hidden" name="idname" value="{{$key}}">
					@endif
				@endforeach
				<tr><td colspan="2"><button type="submit" class="button submit">Сохранить</button></td></tr>
				<tr><td colspan="2"><a class="button submit b" href="{{route('tables')}}?Name={{$_GET['tableName']}}">Назад</a></td></tr>
			@else
				@php
					$value = "";
				@endphp
				@foreach ($rows as $key)
					@if ($key != "ID" && $key != "id")
						@if (preg_match("/ID$/",$key) && $key != "ID" && $key != "SessionID" || $key == "user_id")
							@if ($key != "user_id")
								@php
									$foreign = substr($key, 0, -2);
									$foreign = lcfirst($foreign);
									if (substr($foreign, -1) == 'y') {
										$foreign = substr($foreign,0,-1).'ies'; 
									} else {
										$foreign = $foreign.'s';
									}
									$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
								@endphp
							@else
								@php
									$foreign = "users";
									$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
								@endphp
							@endif
							@if ($name != '')
							<tr>
								<td><label for="{{$key}}">{{$key}}</label></td>
								<td><select name="{{$key}}" required>
									@foreach (DB::table($foreign)->get() as $row)
										@if ($row->ID == $value)
											<option value="{{$row->ID}}" selected>{{$row->Name}}</option>
										@else
											<option value="{{$row->ID}}">{{$row->Name}}</option>
										@endif
									@endforeach
								</select></td>
							</tr>
							@else
								<tr>
								<td><label for="{{$key}}">{{$key}}</label></td>
								<td><select name="{{$key}}" required>
									@foreach (DB::table($foreign)->get() as $row)
										@if ($row->ID == $value)
											<option value="{{$row->ID}}" selected>{{$row->Name ?? $row->ID}}</option>
										@else
											<option value="{{$row->ID}}">{{$row->Name ?? $row->ID}}</option>
										@endif
									@endforeach
								</select></td>
							</tr>
							@endif
						@elseif ($table_info->where('Field', $key)->first()->Type == "timestamp")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="datetime-local" name="{{$key}}" value="{{str_replace(' ', 'T', $value)}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "int")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="1" name="{{$key}}" min=0 value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "double(8,2)")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="any" min=0 name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@elseif ($table_info->where('Field', $key)->first()->Type == "tinyint(1)")
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="number" step="1" min=0 max=1 name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@else
							<tr><td><label for="{{$key}}">{{$key}}</label></td><td><input type="text" name="{{$key}}" value="{{$value}}" <? if ($table_info->where('Field', $key)->first()->Null == 'NO'): ?> required <? endif; ?>></td></tr>
						@endif
					@else
						<input type="hidden" name="ID" value="{{$value}}">
						<input type="hidden" name="idname" value="{{$key}}">
					@endif
				@endforeach
				<tr><td colspan="2"><button type="submit" class="button submit">Сохранить</button></td></tr>
				<tr><td colspan="2"><a class="button submit b" href="{{route('tables')}}?Name={{$_GET['tableName']}}">Назад</a></td></tr>
			@endif
			</table>
		</form>
	</div>
@endsection