@extends('layouts.master')

@section('title') Posts @endsection

@section('content')
    <h6 class="element-header">
        All Posts
    </h6>
    <div class="element-box">
        <div class="table-responsive">
            <table id="mainTable" class="table table-lightborder table-striped table-lightfont dataTable">
                <thead>
                    <th>Post Type</th>
                    <th>Product Type</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Part No</th>
                    <th>Spec</th>
                    <th>Colour</th>
                    <th>Storage</th>
                    <th>Type Condition</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </div>

    <!-- Update Model -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Edit Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                </div>
                <div class="modal-body">
                    <form action=""></form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"> Close </button>
                    <button type="button" class="btn btn-success save"> Save </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/bower_components/jquery.serializejson.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <script>
        var config = {
            apiKey: "AIzaSyCuh0RGbUDqpxkkyq8ohzI0wIGKu1FeHp4",
            authDomain: "cx-app-b3b2a.firebaseapp.com",
            databaseURL: "https://cx-app-b3b2a.firebaseio.com",
            projectId: "cx-app-b3b2a",
            storageBucket: "cx-app-b3b2a.appspot.com",
            messagingSenderId: "136046956873",
            appId: "1:136046956873:web:9ede56d9c1a0373e390a98",
            measurementId: "G-YW5M5KSEVD"
        };
        firebase.initializeApp(config);

        let data = []
        var tbl = $('#mainTable').DataTable({
            "data": data,
            'createdRow': function( row, data, dataIndex ) {
                $(row).attr('id', data.mId + '-' + data.sId);
            },
            'columns' : [
                { "data" : "type"},
                {
                    render: function ( data, type, row ) {
                        return row.product ? row.product : '';
                    },
                },
                {
                    render: function ( data, type, row ) {
                        return row.selmake ? row.selmake : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.selmodel ? row.selmodel : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.selPartNo ? row.selPartNo : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.moreregional ? row.moreregional : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.selColor ? row.selColor : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.morestorage ? row.morestorage : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.morestockcondition ? row.morestockcondition : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.selQuantity ? row.selQuantity : '';
                    }
                },
                {
                    render: function ( data, type, row ) {
                        return row.moredescription ? row.moredescription : row.servicedescription;
                    }
                },

                {
                    render: function (data, type, row) {
                        return `<button class="btn text-primary btn-edit">
                                   <i class=" os-icon os-icon-ui-49"></i>
                                </button>
                                <button class="btn text-danger btn-delete">
                                   <i class="os-icon os-icon-ui-15"></i>
                                </button>`
                    }
                },
            ],
        })

        function fetchData(){

            firebase.database().ref('/NewPosts').on('value', function(types){
                tbl.clear().draw();
                types.forEach((products) => {
                    let type = products.key
                    if(type == 'buy' || type == 'sell'){
                        products.forEach((mIds) => {
                            let product = mIds.key
                            mIds.forEach((sIds) => {
                                let mId = sIds.key
                                sIds.forEach(( item ) => {
                                    post = item.val()
                                    post.type = type
                                    post.product = product
                                    post.mId = mId
                                    post.sId = item.key
                                    tbl.rows.add([post]).draw()
                                })
                            })
                        })
                    }
                    if(type == 'services'){
                        products.forEach((sIds) => {
                            let mId = sIds.key
                            sIds.forEach(( item ) => {
                                post = item.val()
                                post.type = type
                                post.mId = mId
                                post.sId = item.key
                                tbl.rows.add([post]).draw()
                            })
                        })
                    }
                })

            })

        }

        window.onload = fetchData

        $(function(){
            var closeButtons =$('.close');
            let postType = null
            let productType = null
            let mId = null
            let sId = null

            $('#mainTable').on('click', '.btn-edit', function(){
                let post = tbl.row($(this).parents('tr')).data()
                postType = post.type
                productType = post.product
                mId = post.mId
                sId = post.sId
                $('#editModal form').html(`
                    <div class="form-group">
                        <label>Make</label>
                        <input type="text" name="selmake" class="form-control" value="${post.selmake}">
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="selmodel" class="form-control" value="${post.selmodel}">
                    </div>
                    <div class="form-group">
                        <label>Part No</label>
                        <input type="text" name="selPartNo" class="form-control" value="${post.selPartNo}">
                    </div>
                    <div class="form-group">
                        <label>SPEC</label>
                        <input type="text" name="moreregional" class="form-control" value="${post.moreregional}">
                    </div>
                    <div class="form-group">
                        <label>COLOR</label>
                        <input type="text" name="selColor" class="form-control" value="${post.selColor}">
                    </div>
                    <div class="form-group">
                        <label>STORAGE</label>
                        <input type="text" name="morestorage" class="form-control" value="${post.morestorage}">
                    </div>
                    <div class="form-group">
                        <label>TYPE CONDITION</label>
                        <input type="text" name="morestockcondition" class="form-control" value="${post.morestockcondition}">
                    </div>
                    <div class="form-group">
                        <label>QTY</label>
                        <input type="text" name="selQuantity" class="form-control" value="${post.selQuantity}">
                    </div>
                    <div class="form-group">
                        <label>DESCRIPTION</label>
                        <input type="text" name="moredescription" class="form-control" value="${post.moredescription}">
                    </div>
                `)
                $('#editModal').modal('show')
            })

            $('#editModal .save').on('click', function(){
                firebase.database().ref('/NewPosts/' + postType + '/' + productType + '/' + mId + '/' + sId ).update($('#editModal form').serializeJSON())
                closeButtons.trigger('click');
            })

            $('#mainTable').on('click', '.btn-delete', function(){
                if(confirm('Are you sure')){
                    let post = tbl.row($(this).parents('tr')).data()
                    firebase.database().ref('/NewPosts/' + postType + '/' + productType + '/' + mId + '/' + sId ).remove()
                }
            })
        })
    </script>
@endsection
