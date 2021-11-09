@extends('layouts.master')

@section('title') Storages @endsection

@section('content')
    <h6 class="element-header">
        All Storages
    </h6>
    <div class="element-box">
        <div class="my-2 text-right">
            <a href="{{ route('user.storages.create') }}" class="btn btn-primary mr-3">New Storage</a>
        </div>
        <div class="table-responsive">
            <table id="dtbl" width="100%" class="table table-striped table-lightfont">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>
                                <a href="{{ route('user.storages.edit', $row->id) }}">
                                    <i class="os-icon os-icon-ui-49"></i></a>
                                <a class="text-danger"
                                   href="javascript:void();"
                                   onclick="event.preventDefault(); document.getElementById('row-delete-{{$row->id}}').submit();"
                                >
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                                <form
                                    id="row-delete-{{$row->id}}"
                                    action="{{ route('user.storages.destroy', $row->id) }}" method="POST"
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
