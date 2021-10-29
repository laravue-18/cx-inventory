@extends('layouts.master')

@section('title') Conditions @endsection

@section('content')
    <h6 class="element-header">
        All Conditions
    </h6>
    <div class="element-box">
        <div class="my-2 text-right">
            <a href="{{ route('user.conditions.create') }}" class="btn btn-primary mr-3">New Condition</a>
        </div>
        <div class="table-responsive">
            <table id="dtbl" width="100%" class="table table-striped table-lightfont">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#dtbl').DataTable();
    </script>
@endsection
