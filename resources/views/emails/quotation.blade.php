@component('mail::message')
<div style="text-align: left">
    التاريخ : {{ Carbon\Carbon::today()->format('m/d/Y') }}
</div>
# عرض سعر رقم {{ $element->id }}
# تحية طيبة وبعد،،
{!! $element->brief !!}
</br>
@component('mail::table')
| السعر       | {{ $element->title }}         | م.  |
| ------------- |:-------------:| --------:|
| {{ $element->price }}         | <div style="direction: rtl !important;">{!! $element->content !!}</div>           | 1         |
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
<div style="direction: rtl !important;">
{!! $element->hints !!}
    </div>
@endcomponent


@component('mail::button', ['url' => 'http://ideasowners.net'])
<strong>Ideasowners - شركة أصحاب أفكار</strong>
@endcomponent


<div style="text-align: center; width: 30%; float: left;">
    مع تحيات,<br>
    شركة أصحاب أفكار
</div>
@endcomponent
