@component('mail::message')
<div style="text-align: left;">
    التاريخ : {{ Carbon\Carbon::today()->format('d/m/Y') }}
</div>
# عرض سعر رقم {{ $element->id }}
<strong style="direction: rtl; float: right;"> {{ $element->to }}</strong>
<br>

# تحية طيبة وبعد
<p style="font-family: Cairo">
    {!! $element->brief !!}
</p>
<br>
{{--@component('mail::table')--}}
{{--| السعر       | {{ $element->title }}         |  |--}}
{{--| ------------- |:-------------:| --------:|--}}
{{--| {{ $element->price }}         | <div style="direction: rtl !important;">{!! $element->content !!}</div>           |          |--}}
{{--| {{ $element->total  }}        | الإجمالي             |           |--}}
{{--| {{ $element->discount  }}     | الخصم         |           |--}}
{{--| {{ $element->net_total  }}    | الإجمالي بعد الخصم      |           |--}}
{{--@endcomponent--}}
{{--@component('mail::table')--}}
{{--| Prices       | {{ $element->title }}         | S.  |--}}
{{--| ------------- |:-------------:| --------:|--}}
{{--| {{ $element->price }}         | <div style="direction: rtl !important;">{!! $element->content !!}</div>           | 1         |--}}
{{--| {{ $element->total  }}        | total             |           |--}}
{{--| {{ $element->discount  }}     | discount         |           |--}}
{{--| {{ $element->net_total  }}    | net total         |           |--}}
{{--@endcomponent--}}
<hr>
@if(!is_null($element->hints))
    @component('mail::panel')
    {!! html_entity_decode($element->hints) !!}
    @endcomponent
@endif


@component('mail::button', ['url' => 'http://ideasowners.net'])
<strong>Ideasowners</strong>
@endcomponent


<div style="text-align: center; width: 100%; float: left; font-weight: bolder;">
    مع تحيات,<br>
    شركة أصحاب أفكار
</div>
<hr>
<div style="text-align: left; width: 100%; float: left; font-weight: bolder; font-size: small;">

    <span><strong>Ideas Owners Company</strong></span><br>

    <span><strong>Phone:</strong> +965-98824010 </span><br>

    <span><strong>website:</strong> ideasowners.net </span><br>

    <span>Youtube: IdeasOwners</span><br>

    <span><strong></strong>Instagram - Linkedin</span><br>

    <strong>Our Services:</strong><br>

    <span>Website Development</span><br>

    <span>Mobile  Apps Development</span><br>

    <span>Online  Markting Advertisement</span><br>

    <span>Social  Media Management</span><br>

    <strong>location :</strong><br>
    <span>Kuwait -Sharq - Khaled Ibn Al-Waleed St-</span><br>
    <span>Sawaber 6 Tower - Floor 3 - Office 6</span>
</div>
@endcomponent
