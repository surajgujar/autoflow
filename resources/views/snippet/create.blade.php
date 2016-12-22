<div class="panel-group col-md-6 col-sm-12" id="accordion" style="padding-left: 0">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-plus"></i>
                    Add a New Snippet                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">

                <form action="/snippet" method="post">

                    {{ csrf_field() }}

                    {!! \Nvd\Crud\Form::input('snippet_name','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('serialize_condition','text')->show() !!}

                    {!! \Nvd\Crud\Form::select( 'category', [ 'command' ] )->show() !!}

                    {!! \Nvd\Crud\Form::select( 'status', [ '1' ] )->show() !!}

                    <button type="submit" class="btn btn-primary">Create</button>

                </form>

            </div>
        </div>
    </div>
</div>