@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	<h2>Snippet</h2>

	@include('snippet.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','snippet.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('snippet_name','snippet.index','Snippet Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('serialize_condition','snippet.index','Serialize Condition')!!}
			{!!\Nvd\Crud\Html::sortableTh('category','snippet.index','Category')!!}
			{!!\Nvd\Crud\Html::sortableTh('status','snippet.index','Status')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','snippet.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','snippet.index','Updated At')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="snippet_name" value="{{Request::input("snippet_name")}}"></td>
				<td><input type="text" class="form-control" name="serialize_condition" value="{{Request::input("serialize_condition")}}"></td>
				<td>{!!\Nvd\Crud\Html::selectRequested(
					'category',
					[ '', 'command' ],
					['class'=>'form-control']
				)!!}</td>
				<td>{!!\Nvd\Crud\Html::selectRequested(
					'status',
					[ '', '1' ],
					['class'=>'form-control']
				)!!}</td>
				<td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
				<td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
				<td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
			</form>
		</tr>
	    </thead>

	    <tbody>
	    	@forelse ( $records as $record )
		    	<tr>
					<td>
						{{ $record->id }}
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="snippet_name"
							  data-value="{{ $record->snippet_name }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/snippet/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->snippet_name }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="serialize_condition"
							  data-value="{{ $record->serialize_condition }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/snippet/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->serialize_condition }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="select"
							  data-name="category"
							  data-value="{{ $record->category }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/snippet/{{ $record->{$record->getKeyName()} }}"
							  data-source="[{'command':'command'}]">{{ $record->category }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="select"
							  data-name="status"
							  data-value="{{ $record->status }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/snippet/{{ $record->{$record->getKeyName()} }}"
							  data-source="[{'1':'1'}]">{{ $record->status }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'snippet', 'record' => $record ] )
		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 8])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection