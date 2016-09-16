@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Toolbox</div>
                <div class="panel-body">
                  @foreach($toolbox_chapters as $chapters)
                    <h2 style="text-align:center;">{{$chapters->chapter}}</h2>
                    <form method='POST' name="toolboxform" action='/toolbox'>
                      {!! csrf_field() !!}
                      @foreach ($toolbox_questions as $question)
                        @if($chapters->id == $question->toolbox_chapter_id)
                          <div class="row">
                            <div class="span4 collapse-group">
                              <p><a style="float:right;" class="btn" href="#">Lees meer &raquo;</a></p>
                              <label class="control-label">{{$question->question}}:</label>
                               <p class="collapse well">{{$question->description}}</p>
                            </div>
                          </div>
                          <br><br>
                          <textarea class="form-control" rows="2" type='text' name='{{$question->question}}'<?=$disable?>></textarea>
                        @endif
                     
                      @endforeach
                      <input type='submit' value='verzenden'>
                    </form>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function h(e) {
  $(e).css({'height':'auto','overflow-y':'hidden'}).height(e.scrollHeight);
}
$('textarea').each(function () {
  h(this);
}).on('input', function () {
  h(this);
});


$('.row .btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $collapse = $this.closest('.collapse-group').find('.collapse');
    $collapse.collapse('toggle');
});
</script>
@endsection
