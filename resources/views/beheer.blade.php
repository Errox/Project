@extends('layouts.app')
@extends('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body col-md-6">
                </div>
                <div class="panel-body col-md-6">
                  <a href="/questions" class="list-group-item"><span class="glyphicon glyphicon-triangle-right"></span>Questions</a>
                  <a href="/chapters" class="list-group-item"><span class="glyphicon glyphicon-triangle-right"></span>Chapters</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
