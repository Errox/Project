@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Toolbox</div>

                <div class="panel-body">
                    <?php foreach ($toolbox_chapters as $chapters){ ?>

                <h2><?=$chapters->chapter?></h2>
                    <form method='POST' name="toolboxform" action='/toolbox'>
                    {!! csrf_field() !!}
                     <?php foreach ($toolbox_questions as $questions){
                            if ($chapters->id == $questions->chapter_id){?>
                             <label><?=$questions->question?>:</label>
                             <input type='text' name='<?=$questions->question?>'<?=$disable?>>
                             <br>
                  <?php  }
                   
                    }
                        echo "<input type='submit' value='verzenden'>";
                        echo "</form>";
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
