@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Workflow: {{$workflow->name}}</h2>

    <form action="/workflow/{{$workflow->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($workflow)->show() !!}

        {!! \Nvd\Crud\Form::input('serialize_data','text')->model($workflow)->show() !!}

        {!! \Nvd\Crud\Form::select( 'status', [ '1' ] )->model($workflow)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection