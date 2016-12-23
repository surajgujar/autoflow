@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Workflow: {{$workflow->name}}</h2>

    <ul class="list-group">
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$workflow->name}}</h5>
        </li>
    </ul>
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
    
<!--        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$workflow->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Serialize Data</h4>
            <h5>{{$workflow->serialize_data}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Status</h4>
            <h5>{{$workflow->status}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$workflow->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$workflow->updated_at}}</h5>
        </li>-->
@endsection