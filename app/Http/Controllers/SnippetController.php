<?php
namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SnippetController extends Controller
{
    public $viewDir = "snippet";

    public function index()
    {
        $records = Snippet::findRequested();
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
        $this->validate($request, Snippet::validationRules());

        Snippet::create($request->all());

        return redirect('/snippet');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Snippet $snippet)
    {
        return $this->view("show",['snippet' => $snippet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Snippet $snippet)
    {
        return $this->view( "edit", ['snippet' => $snippet] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Snippet::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $snippet->update($data);
            return "Record updated";
        }

        $this->validate($request, Snippet::validationRules());

        $snippet->update($request->all());

        return redirect('/snippet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Snippet $snippet)
    {
        $snippet->delete();
        return redirect('/snippet');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
