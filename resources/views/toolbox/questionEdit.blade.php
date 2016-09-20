@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Vraag "{{$question->question}}" bewerken</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2"> Vraag </th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/question/{{$question->id}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="{{$question->id}}">
                                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Vraag</label>
                                        <div class="col-md-6">
                                            <input required type="text" class="form-control" name="question" value="{{$question->question}}">
                                            @if ($errors->has('question'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('question') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                        <br>
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Beschrijving</label>
                                            <div class="col-md-6">
                                                <textarea required type="text" class="form-control" name="description">{{$question->description}}</textarea>
                                                    @if ($errors->has('description'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chapter">
                                            <div>
                                            <label class="col-md-4 control-label">Hoofdstuk</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="toolbox_chapter_id" id="toolbox_chapter_id">
                                                        @foreach($chapters as $chapter)
                                                            <option id="<?=$chapter->id?>" value="<?= $chapter->id?>"> <?=$chapter->chapter?> </option><br>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-5">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-floppy-o"></i>Opslaan
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </form>
                            </td>
                        </tbody>
                    </table>
                </div>
                <p style="text-align:center;"><a class="btn btn-primary" href="/toolbox/editor">Terug</a></p>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Alle vragen</div>
                    <div class="panel-body">
                      <a id="opener" style="float:right;">Nieuwe vraag <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table class="table">
                            <thead>
                              <tr>
                                  <th> Hoofdstuk </th>
                                  <th> Vraag </th>
                                  <th colspan="2"> Beschrijving </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{'toolbox chapter invullen. '}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>{{$question->description}}</td>
                                    <td><a href="/question/{{$question->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="/question/{{$question->id}}"<i class="fa fa-times" aria-hidden="true"></i></a></td>
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


<div id="dialog" style="width:20%;">
    <div class="panel-heading"></div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/question">
            <div>
                <h3 style="text-align: center;">Vraag gegevens</h3>
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Titel</label>
                        <div class="col-md-6">
                        <input required type="text" class="form-control" name="question" value="{{ old('question') }}">
                            @if ($errors->has('question'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('question') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Beschrijving</label>
                    <div class="col-md-6">
                        <input required type="text" class="form-control" name="description" value="{{ old('description') }}">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="chapter">
                    <div>
                    <label class="col-md-4 control-label">Hoofdstuk</label>
                        <div class="col-md-6">
                            <select class="form-control" name="chapter" id="chapter">
                                @foreach($chapters as $chapter)
                                    <option id="<?=$chapter->id?>" value="<?= $chapter->id?>"> <?=$chapter->chapter?> </option><br>
                                @endforeach
                            </select>
                            <br>
                        </div>
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
    $( "#dialog" ).dialog({
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

     $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });

});
</script>
@endsection
