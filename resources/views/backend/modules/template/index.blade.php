@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>pdf file</th>
                <th>active</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>file name</th>
                <th>active</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td><a href="{{ asset('storage/uploads/files/'.$element->url) }}" class="btn btn-warning">View PDF</a></td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">
                            {{ $element->active ? 'active' : 'N/A' }}
                        </span>
                    </td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('toggle.active',['model' => 'template','id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                </li>
                                <li>
                                    <a href="{{ route('template.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> edit template</a>
                                </li>
                                {{--<li>--}}
                                    {{--<form method="post" action="{{ route('template.destroy',$element->id) }}">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--<input type="hidden" name="_method" value="delete"/>--}}
                                        {{--<button type="submit" class="btn btn-outline btn-sm red">--}}
                                            {{--<i class="fa fa-remove"></i>delete template--}}
                                        {{--</button>--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection