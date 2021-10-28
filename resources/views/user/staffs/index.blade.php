@extends('layouts.master')

@section('title') Staffs @endsection

@section('content')
    <h6 class="element-header">
        All Staffs
    </h6>
    <div class="element-box">
        <div class="my-2">
            <a href="{{ route('user.staffs.create') }}" class="btn btn-primary">New Staff</a>
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
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                            <td>{{ $row->location }}</td>
                            <td>{{ $row->status ? 'Enabled' : 'Disabled' }}</td>
                            <td>
                                <a href="{{ route('user.staffs.edit', $row->id) }}"><i class="os-icon os-icon-ui-49"></i></a>
                                <a class="text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('row-delete-{{$row->id}}').submit();">
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                                <form id="row-delete-{{$row->id}}" action="{{ route('user.staffs.destroy', $row->id) }}" method="POST" style="display: none;">
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

@section('script')
    <script>
        $('#dtbl').DataTable({
            // buttons: ['copy', 'excel', 'pdf']
        });
    </script>
@endsection
