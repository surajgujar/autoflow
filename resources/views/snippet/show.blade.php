@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Snippet: {{$snippet->snippet_name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$snippet->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Snippet Name</h4>
            <h5>{{$snippet->snippet_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Serialize Condition</h4>
            <h5>{{$snippet->serialize_condition}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Category</h4>
            <h5>{{$snippet->category}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Status</h4>
            <h5>{{$snippet->status}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$snippet->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$snippet->updated_at}}</h5>
        </li>
        
    </ul>

@endsection