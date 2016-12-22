@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Snippet: {{$snippet->snippet_name}}</h2>

    <form action="/snippet/{{$snippet->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('snippet_name','text')->model($snippet)->show() !!}

        {!! \Nvd\Crud\Form::input('serialize_condition','text')->model($snippet)->show() !!}

        {!! \Nvd\Crud\Form::select( 'category', [ 'command' ] )->model($snippet)->show() !!}

        {!! \Nvd\Crud\Form::select( 'status', [ '1' ] )->model($snippet)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection