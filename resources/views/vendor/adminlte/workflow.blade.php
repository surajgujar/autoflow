@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Workflow
@endsection


@section('main-content')
    <div id="sample">
      <div style="width:100%; white-space:nowrap;">
        <span style="display: inline-block; vertical-align: top; padding: 5px; width:210px">
          <div id="myPaletteDiv" style="border: solid 1px black; height: 620px"></div>
        </span>

        <span style="display: inline-block; vertical-align: top; padding: 5px; width:80%">
            <div id="myDiagramDiv" style="border: solid 1px black; height: 620px" onmouseenter="getDig()"></div>
        </span>
      </div>
      <div>
        <div>
          <button id="SaveButton" onclick="save()">Save</button>
          <button onclick="load()">Load</button>
          Diagram Model saved in JSON format:
        </div>
        <textarea id="mySavedModel" style="width:100%;height:300px">
            { "class": "go.GraphLinksModel",
              "linkFromPortIdProperty": "fromPort",
              "linkToPortIdProperty": "toPort",
              "nodeDataArray": [
             ],
              "linkDataArray": [
             ]}
        </textarea>
      </div>
    </div>
@endsection
