@extends('backend.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Edit Template</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" method="post" action="{{ route('template.update',$element->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="name" value="{{ $element->name }}" class="form-control"
                                       placeholder="name .." required>
                            </div>
                            <label class="col-md-2 control-label">اسم التمبلت</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="file" name="url" class="form-control" required>
                            </div>
                            <label class="col-md-2 control-label">Template File (PDF only)</label>
                        </div>

                        @include('backend.partials.forms._btn-group')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
