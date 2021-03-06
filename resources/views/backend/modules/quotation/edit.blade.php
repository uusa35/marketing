@extends('backend.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Edit Quotation</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" method="post" action="{{ route('quotation.update',$element->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="_method" value="put">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="to" value="{{ $element->to }}" class="form-control"
                                       placeholder="To .." required>
                            </div>
                            <label class="col-md-2 control-label">السادة</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="mobile" value="{{ $element->mobile }}" class="form-control"
                                       placeholder="هاتف العميل">
                            </div>
                            <label class="col-md-2 control-label">هاتف العميل</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="from" value="{{ $element->from }}" class="form-control"
                                       placeholder="To .." required>
                            </div>
                            <label class="col-md-2 control-label">اسم الشركه للتوقيع</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="subject" value="{{ $element->subject }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                            <label class="col-md-2 control-label">*عنوان عرض السعر</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" name="receivers" value="{{ $element->receivers }}" class="form-control" placeholder="Enter text" required>
                                <div class="help-block pull-right">
                                    يتم كتابة البريد الإلكتروني فقط وكتابه فاصلة بين كل بريد إلكتروني مضاف هكذا :
                                    </br>
                                    email@test.com; another@email.com; ...
                                </div>
                            </div>
                            <label class="col-md-2 control-label">مرسل إلى *</label>
                        </div>

                        <hr>
                        <h5 class="text-center">اختيار القالب ـ التمبلت الذي سيتم ارفاقه مع عرض السعر</h5>
                        <hr>
                        @foreach($temps as $temp)
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="temps[]" {{ in_array($temp->id,$elementTemps, true) ? 'checked' : null }}
                                                       value="{{ $temp->id }}"> {{ $temp->name }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    {{--<label class="col-md-2 control-label">is_required</label>--}}
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        </br>


                        <div class="form-group">
                            <div class="col-md-10">
                                <textarea name="brief" class="form-control summernote"
                                          style="min-height: 100px">{{ $element->brief }}</textarea>
                            </div>
                            <label class="col-md-2 control-label">محتوى عرض السعر</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <textarea name="hints" class="form-control summernote" style="min-height: 100px">{{ $element->hints }}</textarea>
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


{{--old--}}
{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="subject" value="{{ $element->subject }}" class="form-control"--}}
               {{--placeholder="Enter text" required>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">عنوان عرض السعر</label>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="brief" value="{{ $element->brief }}" class="form-control"--}}
               {{--placeholder="Enter text" required>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">محتوى عرض السعر</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="receivers" class="form-control" placeholder="Enter text" value="{{ $element->receivers }}">--}}
        {{--<div class="help-block pull-right">--}}
            {{--يتم كتابة البريد الإلكتروني فقط وكتابه فاصلة بين كل بريد إلكتروني مضاف هكذا :--}}
            {{--</br>--}}
            {{--email@test.com; another@email.com; ...--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">مرسل إلى </label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="title" value="{{ $element->title }}" class="form-control"--}}
               {{--placeholder="Enter text" required>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">عنوان الجدول</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
                                {{--<textarea name="content" class="form-control summernote" style="min-height: 100px">--}}
                                    {{--{!! $element->content !!}--}}
                                {{--</textarea>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">محتوى الجدول</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="price" value="{{ $element->price }}" class="form-control"--}}
               {{--placeholder="Enter text" required>--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">السعر</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="total" value="{{ $element->total }}" class="form-control"--}}
               {{--placeholder="Enter text">--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">الإجمالي</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="discount" value="{{ $element->discount }}" class="form-control"--}}
               {{--placeholder="Enter text">--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">الخصم</label>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-10">--}}
        {{--<input type="text" name="net_total" value="{{ $element->net_total }}" class="form-control"--}}
               {{--placeholder="Enter text">--}}
    {{--</div>--}}
    {{--<label class="col-md-2 control-label">الإجمالي بعد الخصم</label>--}}
{{--</div>--}}
