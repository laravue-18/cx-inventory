@extends('layouts.master')

@section('title') Users @endsection

@section('content')
    <h6 class="element-header">
        All Users
    </h6>
    <div class="element-box">
        <div class="my-2 text-right">
            <a href="{{ route('user.users.create') }}" class="btn btn-primary mr-3">New User</a>
        </div>
        <div class="table-responsive">
            <table id="dtbl" width="100%" class="table table-striped table-lightfont">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Web</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->city }}</td>
                            <td>{{ $row->country }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->web }}</td>
                            <td>{{ $row->type }}</td>
                            <td>
                                <a href="{{ route('user.users.edit', $row->id) }}">
                                    <i class="os-icon os-icon-ui-49"></i></a>
                                <a class="text-danger"
                                   href="javascript:void();"
                                   onclick="event.preventDefault(); document.getElementById('row-delete-{{$row->id}}').submit();"
                                >
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                                <form
                                    id="row-delete-{{$row->id}}"
                                    action="{{ route('user.users.destroy', $row->id) }}" method="POST"
                                    style="display: none;"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script1')
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#dtbl').DataTable();
    </script>
@endsection
