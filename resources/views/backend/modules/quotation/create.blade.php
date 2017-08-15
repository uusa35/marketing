@extends('backend.layouts.app')

@section('content')
    <div class="col-lg-6 col-lg-push-3">
        <img src="{{ asset('images/sample.png') }}" alt="" class="img-responsive img-thumbnail">
    </div>
    <div class="col-lg-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Create New Quotation</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" method="post" action="{{ route('quotation.store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="to" value="{{ old('to') }}" class="form-control"
                                       placeholder="To .." required>
                            </div>
                            <label class="col-md-2 control-label">السادة</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="from" value="{{ old('from') }}" class="form-control"
                                       placeholder="To .." required>
                            </div>
                            <label class="col-md-2 control-label">اسم الشركه للتوقيع</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                            <label class="col-md-2 control-label">عنوان عرض السعر</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="brief" value="{{ old('brief') }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                            <label class="col-md-2 control-label">محتوى عرض السعر</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="receivers" class="form-control" placeholder="Enter text">
                                <div class="help-block pull-right">
                                    يتم كتابة البريد الإلكتروني فقط وكتابه فاصلة بين كل بريد إلكتروني مضاف هكذا :
                                    </br>
                                    email@test.com, another@email.com
                                </div>
                            </div>
                            <label class="col-md-2 control-label">مرسل إلى </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                            <label class="col-md-2 control-label">عنوان الجدول</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <textarea name="content" class="form-control summernote"></textarea>
                            </div>
                            <label class="col-md-2 control-label">محتوى الجدول</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                            <label class="col-md-2 control-label">السعر</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="total" value="{{ old('total') }}" class="form-control"
                                       placeholder="Enter text">
                            </div>
                            <label class="col-md-2 control-label">الإجمالي</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="discount" value="{{ old('discount') }}" class="form-control"
                                       placeholder="Enter text">
                            </div>
                            <label class="col-md-2 control-label">الخصم</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="net_total" value="{{ old('net_total') }}" class="form-control"
                                       placeholder="Enter text">
                            </div>
                            <label class="col-md-2 control-label">الإجمالي بعد الخصم</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <textarea name="hints" class="form-control summernote" style="min-height: 100px"></textarea>
                                {{--summernote--}}
                            </div>
                            <label class="col-md-2 control-label">ملاحظات</label>
                        </div>


                        @include('backend.partials.forms._btn-group')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
