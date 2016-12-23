@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	<h2>Workflow</h2>

	@include('workflow.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','workflow.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('name','workflow.index','Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('serialize_data','workflow.index','Serialize Data')!!}
			{!!\Nvd\Crud\Html::sortableTh('status','workflow.index','Status')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','workflow.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','workflow.index','Updated At')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
				<td><input type="text" class="form-control" name="serialize_data" value="{{Request::input("serialize_data")}}"></td>
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
							  data-name="name"
							  data-value="{{ $record->name }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/workflow/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->name }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="serialize_data"
							  data-value="{{ $record->serialize_data }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/workflow/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->serialize_data }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="select"
							  data-name="status"
							  data-value="{{ $record->status }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/workflow/{{ $record->{$record->getKeyName()} }}"
							  data-source="[{'1':'1'}]">{{ $record->status }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'workflow', 'record' => $record ] )
		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 7])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection