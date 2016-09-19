@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Hoofdstuk "{{$chapter->chapter}}" bewerken</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                              <th colspan="2"> Hoofdstuk </th>
                          </tr>
                      </thead>
                      <tbody>
                            <tr>
                              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/chapter/{{$chapter->id}}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{$chapter->id}}">
                                <td><div class="form-group{{ $errors->has('chapter') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Beschrijving</label>
                                    <div class="col-md-6">
                                        <input required type="text" class="form-control" name="chapter" value="{{$chapter->chapter}}">
                                        @if ($errors->has('chapter'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('chapter') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div></td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-offset-5">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-floppy-o"></i>Opslaan
                                            </button>
                                        </div>
                                    </div>
                                </td>
                             </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Alle Hoofdstukken</div>
                    <div class="panel-body">
                      <a id="opener2" style="float:right;">Nieuw hoofstuk <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table class="table">
                            <thead>
                              <tr>
                                  <th colspan="2"> Hoofdstuk </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{$chapter->chapter}}</td>
                                    <td><a href="/chapter/{{$chapter->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="/chapter/{{$chapter->id}}"<i class="fa fa-times" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialog2" style="width:20%;">
    <div class="panel-heading"></div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/ChapterController'">
            <div>
                <h3 style="text-align: center;">Hoofdstuk gegevens</h3>
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('chapter') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Titel</label>
                        <div class="col-md-6">
                        <input required type="text" class="form-control" name="chapter" value="{{ old('chapter') }}">
                            @if ($errors->has('chapter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('chapter') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-floppy-o"></i>Opslaan
                        </button>
                    </div>
                </div>
            </div>
        </form>
</div>
<script>
 $( function() {
    $( "#dialog2" ).dialog({
      width: 400,
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });

     $( "#opener2" ).on( "click", function() {
      $( "#dialog2" ).dialog( "open" );
    });

});
</script>

@endsection
