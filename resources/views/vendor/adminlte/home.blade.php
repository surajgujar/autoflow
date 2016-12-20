@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
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
<!--	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Automation WorkFlow</div>
					<div class="panel-body">
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		</div>
	</div>-->
@endsection
