@component('mail::message')
<div style="text-align: left">
    التاريخ : {{ Carbon\Carbon::today()->format('m/d/Y') }}
</div>
# عرض سعر رقم
# {{ $element->id }}
# تحية طيبة وبعد،،
{{ $element->brief }}
</br>
@component('mail::table')
| Prices       | {{ $element->title }}         | S.  |
| ------------- |:-------------:| --------:|
| {{ $element->price }}         | {!! $element->content !!}           | 1         |
| {{ $element->total  }}        | total             |           |
| {{ $element->discount  }}     | discount         |           |
| {{ $element->net_total  }}    | net total         |           |
@endcomponent
<hr>

@component('mail::panel')
{!! $element->hints !!}
@endcomponent


@component('mail::button', ['url' => 'http://ideasowners.net'])
Ideasowners - شركة أصحاب أفكار
@endcomponent

<div style="text-align: left">
    مع تحيات,<br>
    شركة أصحاب أفكار
</div>
@endcomponent
