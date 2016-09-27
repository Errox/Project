@extends('layouts.app')

@section('content')
<?php $heading = true; ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Toolbox</div>
                <div class="panel-body">
                  @foreach($toolbox_chapters as $chapters)
                    <form method='POST' name="toolboxform" action=''>
                      {!! csrf_field() !!}
                      @foreach ($toolbox_questions as $question)
                        @if($chapters->id == $question->toolbox_chapter_id)
                          @if($heading == true)
                          <h2 style="text-align:center;">{{$chapters->chapter}}</h2>
                          <?php $heading = false; ?>
                          @endif
                          <?php $check = true; ?>
                            <div class="row">
                              <div class="span4 collapse-group">
                                <p><a style="float:right;" class="btn" href="#">Lees meer &raquo;</a></p>
                                <label class="control-label">{{$question->question}}:</label>
                                 <p class="collapse well tb_desc">{{$question->description}}</p>
                              </div>
                            </div>
                            <br><br>
                            @if($question->toolbox_setting->type == 'Textarea')
                              <textarea class="well tb_txt" rows="2" name='{{$question->question}}'<?=$disable?>></textarea>
                            @elseif($question->toolbox_setting->type == 'Text')
                              <input type="text" class="form-control" rows="2" name='{{$question->question}}'<?=$disable?> />
                            @endif
                          @endif
                     
                      @endforeach
                      @if($check == true)
                      <input type='submit' value='verzenden'>
                      @endif
                    </form>
                    <?php $check = false; ?>
                    <?php $heading = true; ?>
                  @endforeach
                  <div style="text-align:center">
                    {{ $toolbox_chapters->links() }}
                  </div>
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
