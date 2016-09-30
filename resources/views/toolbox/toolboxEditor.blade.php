@extends('layouts.app')
@section('content')
<script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Alles</div>
                <div class="panel-body">
                  <a id="opener2" style="float:right;">Nieuw hoofstuk <i class="fa fa-plus" aria-hidden="true"></i></a>
                    <table class="table">
                        <thead>
                          <tr>
                              <th> Hoofdstuk </th>
                              <th colspan='2'> Beschrijving </th>
                          </tr>
                      </thead>
                      <?php $loop = 1; ?>
                        @foreach($chapters as $chapter)
                        <tbody class="collapse-group">
                            <tr>
                                <td>{{$chapter->chapter}}</td>
                                <td>{{$chapter->description}}</td>
                                <td><a href="/chapter/{{$chapter->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="/chapter/{{$chapter->id}}"<i class="fa fa-times" aria-hidden="true"></i></a></td>
                                <td><a style="float:right;" class="btn" href="#" name="question<?=$loop?>" id="button<?=$loop;?>" onclick="uitklap(this)">Lees meer &raquo;</a></td>
                             <tbody id="question<?=$loop?>" class="collapse">  

                             
                           @foreach($questions as $question)
                           @if($chapter->id == $question->toolbox_chapter_id)     
                                <tr><td><span class="tb_question">{{$question->question}}</span></td>
                                <td class="col-md-2"><a href="/question/{{$question->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="/question/{{$question->id}}"<i class="fa fa-times" aria-hidden="true"></i></a></td> 
                                </tr>
                                
                                @endif
                            @endforeach
                            </tbody>
                            </tr>
                            </tbody>
                        <?php $loop += 1; ?>     
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Alle vragen</div>
                <div class="panel-body">
                  <a id="opener" style="float:right;">Nieuwe vraag <i class="fa fa-plus" aria-hidden="true"></i></a>
                    <table class="table">
                        <thead>
                          <tr>
                              <th> Hoofdstuk </th>
                              <th> Vraag </th>
                              <th> settings </th>
                              <th colspan="2"> Beschrijving </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->Toolbox_chapter->chapter}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->toolbox_setting->type}}</td>
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


<!-- dialog boxxes -->
<div id="dialog" style="width:50%;">
    <div class="panel-heading"></div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/question" novalidate>
            <div>
                <h3 style="text-align: center;">Vraag gegevens</h3>
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        <label class="col-md-1 control-label">Titel</label>
                            <div class="col-md-12">
                            <input required type="text" class="form-control" name="question" value="{{ old('question') }}">
                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-1 control-label">Beschrijving</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('tips') ? ' has-error' : '' }}">
                        <label class="col-md-1 control-label">Tips & tricks</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" name="tips" value="{{ old('tips') }}"></textarea>
                            @if ($errors->has('tips'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tips') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-md-4 control-label">Hoofdstuk</label>
                        <div class="col-md-7">
                            <select class="form-control" name="chapter" id="chapter">
                                @foreach($chapters as $chapter)
                                    <option id="<?=$chapter->id?>" value="<?= $chapter->id?>"> <?=$chapter->chapter?> </option><br>
                                @endforeach
                            </select>
                            <br>
                        </div>

                    <label class="col-md-4 control-label">Type</label>
                        <div class="col-md-6">
                            <select class="form-control" name="toolbox_setting" id="toolbox_setting">
                                @foreach($toolbox_settings as $toolbox_setting)
                                    <option id="<?=$toolbox_setting->id?>" value="<?= $toolbox_setting->id?>"> <?=$toolbox_setting->type?> </option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-floppy-o"></i>Opslaan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>

<div id="dialog2" style="width:20%;">
    <div class="panel-heading"></div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/chapter" novalidate>
            <div>
                <h3 style="text-align: center;">Hoofdstuk gegevens</h3>
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('chapter') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Titel</label>
                        <div class="col-md-8">
                        <input required type="text" class="form-control" name="chapter" value="{{ old('chapter') }}">
                            @if ($errors->has('chapter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('chapter') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Beschrijving</label>
                        <div class="col-md-8">
                        <textarea required class="form-control" name="description" value="{{ old('description') }}"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
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
    $( "#dialog" ).dialog({
      width:('80%'),
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

    $( "#dialog2" ).dialog({
      width:('80%'),
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
  } );

function h(e) {
  $(e).css({'height':'auto','overflow-y':'hidden'}).height(e.scrollHeight);
}
$('textarea').each(function () {
  h(this);
}).on('input', function () {
  h(this);
});



function uitklap(element){
    var id = element.id;
    var uitklap = element.name;
   var lees_meer = document.getElementById(uitklap);
   $lees_meer = lees_meer.id;
   console.log($lees_meer);
   if (document.getElementById($lees_meer).className === "collapse"){
   document.getElementById($lees_meer).className = "";
}
else{
    document.getElementById($lees_meer).className = "collapse";
}



}

</script>
@endsection
