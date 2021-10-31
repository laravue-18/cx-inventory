@extends('layouts.master')

@section('title') Stock @endsection

@section('content')
    <h6 class="element-header">
        Stock
    </h6>
    <div class="element-box">
        <div class="my-2 text-right">
            <a href="{{ route('user.products.create') }}" class="btn btn-primary mr-3">New Stock</a>
        </div>
        <div class="table-responsive">
            <table id="dtbl" width="100%" class="table table-striped table-lightfont">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Make</th>
                        <th>Supplier</th>
                        <th>Location</th>
                        <th>Part Number</th>
                        <th>Colour</th>
                        <th>Storage</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->productModel->name }}</td>
                            <td>{{ $row->make->name }}</td>
                            <td>{{ $row->supplier->name }}</td>
                            <td>{{ $row->location->name }}</td>
                            <td>{{ $row->part_number }}</td>
                            <td>{{ $row->colour->name }}</td>
                            <td>{{ $row->storage->name }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->note }}</td>
                            <td>
                                <a href="{{ route('user.products.edit', $row->id) }}">
                                    <i class="os-icon os-icon-ui-49"></i></a>
                                <a class="text-danger"
                                   href="javascript:void();"
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

@section('script')
    <script>
        $('#dtbl').DataTable({
            buttons: ['copy', 'excel', 'pdf']
        });
    </script>
@endsection
