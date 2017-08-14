@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>to</th>
                <th>from</th>
                <th>receivers</th>
                <th>subject</th>
                {{--<th>brief</th>--}}
                {{--<th>content</th>--}}
                <th>price</th>
                <th>total</th>
                <th>discount</th>
                <th>net_total</th>
                {{--<th>hints</th>--}}
                <th>approved</th>
                <th>user</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>to</th>
                <th>from</th>
                <th>receivers</th>
                <th>subject</th>
                {{--<th>brief</th>--}}
                {{--<th>content</th>--}}
                <th>price</th>
                <th>total</th>
                <th>discount</th>
                <th>net_total</th>
                {{--<th>hints</th>--}}
                <th>approved</th>
                <th>user</th>
                <th>action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements->sortByDesc('id') as $element)
                <tr>
                    <td>{{ $element->id  }}</td>
                    <td>{{ $element->to  }}</td>
                    <td>{{ $element->from  }}</td>
                    <td>
                        @if(strpos($element->recievers,';') !== 'false')
                            <ul>
                                <?php $emails = explode(';', $element->receivers) ?>
                                @foreach($emails as $email)
                                    <li>{{ $email }}</li>
                                @endforeach
                            </ul>
                        @else
                            {{ $element->receivers }}
                        @endif
                    </td>
                    <td>{{ $element->subject  }}</td>
                    {{--<td>{{ $element->brief  }}</td>--}}
                    {{--<td>{{ $element->content  }}</td>--}}
                    <td>{{ $element->price  }}</td>
                    <td>{{ $element->total  }}</td>
                    <td>{{ $element->discount  }}</td>
                    <td>{{ $element->net_total  }}</td>
                    {{--<td>{{ $element->hints  }}</td>--}}
                    <td>
                        <span class="label {{ activeLabel($element->approved) }}">
                            <i class="fa fa-fw fa-check-circle"></i>
                        </span>
                    </td>
                    <td>{{ $element->user->name }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                @if(!$element->approve)
                                    <li>
                                        <a href="{{ route('quotation.edit',$element->id) }}">
                                            <i class="fa fa-fw fa-user"></i>edit</a>
                                    </li>
                                @endif
                                @if(auth()->user()->isAdmin)
                                    <li>
                                        <a href="{{ route('quotation.approve',['model' => 'quotation', 'id' => $element->id]) }}">
                                            <i class="fa fa-fw fa-user"></i>toggle approve</a>
                                    </li>
                                    <li>
                                        <form method="post" action="{{ route('quotation.destroy',$element->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete"/>
                                            <button type="submit" class="btn btn-outline btn-sm red">
                                                <i class="fa fa-remove"></i>delete
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection