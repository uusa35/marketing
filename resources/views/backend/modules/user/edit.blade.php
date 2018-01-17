@extends('backend.layouts.app')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',$element->id) }}">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="put">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">name</label>

            <div class="col-md-6">
                <input type="name" class="form-control" name="name" value="{{ $element->name }}" required>
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">email </label>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ $element->email }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">{{ trans('general.password') }}</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="col-xs-12 btn custom-button" >
                    update
                </button>
            </div>
        </div>
    </form>
@endsection