@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>active</th>
                <th>admin</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>active</th>
                <th>admin</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->email }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">
                            {{ $element->active ? 'active' : 'N/A' }}
                        </span>
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->admin) }}">
                            {{ $element->admin ? 'admin' : 'N/A' }}
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
                                    <a href="{{ route('user.active',['model' => 'user','id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.admin',['model' => 'user', 'id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> Toggle Admin</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection