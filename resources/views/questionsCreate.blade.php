@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading">Alle vragen</div>
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/question') }}">
                    <div>
                        <h3 style="text-align: center;">Algemene gegevens</h3>
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Titel<span>*</span></label>
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
                            <label class="col-md-4 control-label">Beschrijving<span>*</span></label>
                            <div class="col-md-6">
                                <input required type="text" class="form-control" name="description" value="{{ old('description') }}">
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
        </div>
    </div>
</div>
@endsection