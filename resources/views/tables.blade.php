@extends('layouts.base')

@section('title', 'Таблицы')

@section('content')
	<div class="adminpanel-tables">
		<form method="get" action="{{ route('tables')}}" class="table-select">
			<label for="Name">Таблица:</label>
			<select id="table-name" name="Name" onchange="this.form.submit(); $(this).prop('disabled', true);">
				<option selected disabled></option>
				@foreach ($tables as $key=>$table)
					@if ($table->Tables_in_eshop_db != "migrations" && $table->Tables_in_eshop_db != "personal_access_tokens")
						@isset($table_items)
							<option value="{{ $table->Tables_in_eshop_db }}" <? if($table_name == $table->Tables_in_eshop_db): ?> selected <? endif; ?> >{{ $table->Tables_in_eshop_db }}</option>
						@else
							<option value="{{ $table->Tables_in_eshop_db }}">{{ $table->Tables_in_eshop_db }}</option>
						@endisset
					@endif
				@endforeach
			</select>
		</form>
		<br/>
			@isset($table_items)
				<script>
					$('#table-name').val({{$table_name}});
				</script>
				<table>
				<tr>
					@foreach ($table_info as $title)
						<td>{{ $title->Field }}</td>
					@endforeach
				</tr>
				@foreach ($table_items as $item)
					<tr>
						@foreach($item as $key=>$value)
							<td>
								@php
									if (preg_match("/ID$/",$key) && $key != "ID" && $key != "SessionID" || $key == "user_id")
									{
										if ($key != "user_id")
										{
											$foreign = substr($key, 0, -2);
											$foreign = lcfirst($foreign);
											if (substr($foreign, -1) == 'y') {
												$foreign = substr($foreign,0,-1).'ies'; 
											} else {
												$foreign = $foreign.'s';
											}
											$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
											if ($name != ''){
												echo $value.' - '.$name;
											} else {
												echo $value ?? '-';
											}
										} else {
											$foreign = "users";
											$name = DB::table($foreign)->get()->where('ID', $value)->first()->Name ?? '';
											if ($name != ''){
												echo $value.' - '.$name;
											} else {
												echo $value ?? '-';
											}
										}
									} else {
										echo $value ?? '-';
									}
								@endphp
							</td>
						@endforeach
						<td>
							<form action="{{ route('edit') }}" method="GET">
								<input type="hidden" name="tableName" value="{{ $table_name }}">
								<input type="hidden" name="ID" value="{{ $item->ID ?? $item->id }}">
								<button class="button submit" type="submit">Редактировать</button>
							</form>
						</td>
						<td>
							<form action="{{ route('tabledel') }}" method="POST">
								@csrf
								<input type="hidden" name="tableName" value="{{ $table_name }}">
								<input type="hidden" name="ID" value="{{ $item->ID ?? $item->id }}">
								<button class="button submit" type="submit">Удалить</button>
							</form>
						</td>
					</tr>
				@endforeach
				<tr>
					@for ($i = 0; $i < count($table_info); $i++)
						<td>*</td>
					@endfor
					<td colspan="2">
						<form action="{{ route('edit') }}" method="GET">
							<input type="hidden" name="tableName" value="{{ $table_name }}">
							<input type="hidden" name="ID" value="">
							<button class="button submit" type="submit">Добавить</button>
						</form>
					</td>
				</tr>
				</table>
			@endisset
		</div>
@endsection
