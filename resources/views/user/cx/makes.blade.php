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
                    <th>Make</th>
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
            "columns" : [
                { "data" : "name"},
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

            firebase.database().ref('/Make').on('value', function(makes){
                tbl.clear().draw();
                makes.forEach((make) => {
                    tbl.rows.add([{'name' : make.key}]).draw()
                })
            })

        }

        window.onload = fetchData

        $(function(){
            var closeButtons =$('.close');
            let model = null
            let mId = null
            let sId = null

            $('#mainTable').on('click', '.btn-edit', function(){
                let post = tbl.row($(this).parents('tr')).data()
                model = post.model
                mId = post.mId
                sId = post.sId
                $('#editModal form').html(`
                    <div class="form-group">
                        <label>Make</label>
                        <input type="text" name="selmake" class="form-control" value="${post.selmake}">
                    </div>
                `)
                $('#editModal').modal('show')
            })

            $('#editModal .save').on('click', function(){
                firebase.database().ref('/NewPosts/buy/' + model + '/' + mId + '/' + sId ).update({})
                closeButtons.trigger('click');
            })

            $('#mainTable').on('click', '.btn-delete', function(){
                if(confirm('Are you sure')){
                    let post = tbl.row($(this).parents('tr')).data()
                    firebase.database().ref('/NewPosts/buy/' + post.model + '/' + post.mId + '/' + post.sId ).remove()
                }
            })
        })
    </script>
@endsection
