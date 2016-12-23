<?php
namespace App\Http\Controllers;

use App\Workflow;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkflowController extends Controller
{
    public $viewDir = "workflow";

    public function index()
    {
        $records = Workflow::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, Workflow::validationRules());

        Workflow::create($request->all());

        return redirect('/workflow');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Workflow $workflow)
    {
        return $this->view("show",['workflow' => $workflow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Workflow $workflow)
    {
        return $this->view( "edit", ['workflow' => $workflow] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Workflow $workflow)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Workflow::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $workflow->update($data);
            return "Record updated";
        }

        $this->validate($request, Workflow::validationRules());

        $workflow->update($request->all());

        return redirect('/workflow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Workflow $workflow)
    {
        $workflow->delete();
        return redirect('/workflow');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }
    
    public function chart()
    {
        return view("workflow");
    }

}
