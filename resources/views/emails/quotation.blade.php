@component('mail::message')
<div style="text-align: left;">
    التاريخ : {{ Carbon\Carbon::today()->format('d/m/Y') }}
</div>
# عرض سعر رقم {{ $element->id }}
<strong style="direction: rtl; float: right;"> السادة / {{ $element->to }}</strong>
<br>

# تحية طيبة وبعد
{!! $element->brief !!}
</br>
@component('mail::table')
| السعر       | {{ $element->title }}         |  |
| ------------- |:-------------:| --------:|
| {{ $element->price }}         | <div style="direction: rtl !important;">{!! $element->content !!}</div>           |          |
| {{ $element->total  }}        | الإجمالي             |           |
| {{ $element->discount  }}     | الخصم         |           |
| {{ $element->net_total  }}    | الإجمالي بعد الخصم      |           |
@endcomponent
{{--@component('mail::table')--}}
{{--| Prices       | {{ $element->title }}         | S.  |--}}
{{--| ------------- |:-------------:| --------:|--}}
{{--| {{ $element->price }}         | <div style="direction: rtl !important;">{!! $element->content !!}</div>           | 1         |--}}
{{--| {{ $element->total  }}        | total             |           |--}}
{{--| {{ $element->discount  }}     | discount         |           |--}}
{{--| {{ $element->net_total  }}    | net total         |           |--}}
{{--@endcomponent--}}
<hr>

@component('mail::panel')
<div style="font-size: large direction: rtl !important;">
{!! $element->hints !!}
    </div>
@endcomponent


@component('mail::button', ['url' => 'http://ideasowners.net'])
<strong>Ideasowners - شركة أصحاب أفكار</strong>
@endcomponent


<div style="text-align: center; width: 100%; float: left; font-weight: bolder;">
    مع تحيات,<br>
    شركة أصحاب أفكار
</div>
@endcomponent
