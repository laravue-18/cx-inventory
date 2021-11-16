@extends('layouts.master')

@section('title') Tracking @endsection

@section('content')
    <h6 class="element-header">
        Tracking
    </h6>
    <div class="element-box">
        <div class="my-2 text-right">
            <a href="{{ route('user.products.create') }}" class="btn btn-primary mr-3">New Track</a>
        </div>
        <div class="table-responsive">
            <table id="dtbl" width="100%" class="table table-striped table-lightfont">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Date of Purchase</th>
                        <th>Client</th>
                        <th>Location</th>
                        <th>Product Type</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Part No</th>
                        <th>Storage</th>
                        <th>Colour</th>
                        <th>Qty</th>
                        <th>Price Paid</th>
                        <th>Notes</th>
                        <th>Sold to</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->product->id }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->product->make->name }}</td>
                            <td>{{ $row->productModel->name }}</td>
                            <td>{{ $row->part_number }}</td>
                            <td>{{ $row->storage->name }}</td>
                            <td>{{ $row->colour->name }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ count($row->items) ? $row->items[0]->serial_number : '' }}</td>
                            <td>{{ $row->note }}</td>
                            <td>
                                <a href="{{ route('user.products.edit', $row->id) }}">
                                    <i class="os-icon os-icon-ui-49"></i></a>
                                <a class="text-danger"
                                   href="javascript:void(0);"
                                   onclick="event.preventDefault(); document.getElementById('row-delete-{{$row->id}}').submit();"
                                >
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                                <form
                                    id="row-delete-{{$row->id}}"
                                    action="{{ route('user.products.destroy', $row->id) }}" method="POST"
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
