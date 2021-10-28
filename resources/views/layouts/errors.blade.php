@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
{{--        <i class="mdi mdi-block-helper mr-2"></i>--}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
