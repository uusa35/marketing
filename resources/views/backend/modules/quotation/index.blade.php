@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>to</th>
                <th>mobile</th>
                <th>from</th>
                <th>receivers</th>
                <th>subject</th>
                <th>templates</th>
                <th>user</th>
                <th>approved</th>
                <th>sent</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>to</th>
                <th>mobile</th>
                <th>from</th>
                <th>receivers</th>
                <th>subject</th>
                <th>templates</th>
                <th>user</th>
                <th>approved</th>
                <th>sent</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements->sortByDesc('id') as $element)
                <tr>
                    <td>{{ $element->id  }}</td>
                    <td>{{ $element->to  }}</td>
                    <td>{{ $element->mobile }}</td>
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
                    <td>
                        @if(!$element->templates->isEmpty())
                            @if($element->templates->count() > 1)
                                <ul>
                                    @foreach($element->templates as $temp)
                                        <li>
                                            <a href="{{ asset('storage/uploads/files/'.$temp->url) }}">{{$temp->name }}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            @else
                                <ul>
                                    <li>
                                        <a href="{{ asset('storage/uploads/files/'.$element->templates->first()->url) }}">{{$element->templates->first()->name }}</a>
                                    </li>
                                </ul>
                            @endif
                        @endif
                    </td>
                    <td>{{ $element->user->name }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->approved) }}">
                            <i class="fa fa-fw fa-check-circle"></i>
                            {{ $element->approved ? 'approved' : 'N/A' }}
                        </span>
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->sent) }}">
                            <i class="fa fa-fw fa-check-circle"></i>
                            {{ $element->sent ? 'sent' : 'N/A' }}
                        </span>
                    </td>
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

                                <li>
                                    <a href="{{ route('toggle.approve',['model' => 'quotation', 'id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-user"></i>toggle approve</a>
                                </li>
                                <li>
                                    <a href="{{ route('quotation.send',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>approve & send </a>
                                </li>
                                @if(auth()->user()->isAdmin)
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