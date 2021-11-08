@extends('layouts.master')

@section('title') Users @endsection

@section('content')
    <h6 class="element-header">
        All Users
    </h6>
    <div class="element-box">
        <div class="controls-above-table">
            <div class="row">
                <div class="col-sm-6">
                    {{--                                        <a class="btn btn-sm btn-secondary" href="#">Download CSV</a><a class="btn btn-sm btn-secondary"--}}
                    {{--                                            href="#">Archive</a><a class="btn btn-sm btn-danger" href="#">Delete</a>--}}
                </div>
                <div class="col-sm-6">
                    <form class="form-inline justify-content-sm-end">
                        <input id="search-value" class="form-control form-control-sm rounded bright search-value" placeholder="Search" type="search">
                        <select id="select-status" class="form-control form-control-sm rounded bright select-status">
                            <option selected="selected" value="">
                                Select Status
                            </option>
                            <option value="Basic">
                                Basic
                            </option>
                            <option value="Premium">
                                Premium
                            </option>
                            <option value="Business pro">
                                Business Pro
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <!--------------------
              START - Basic Table
              -------------------->
            <table class="table table-lightborder table-striped table-lightfont dataTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Business Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-right">Account Status</th>
                </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
            <!--------------------
              END - Basic Table
              -------------------->
        </div>
    </div>

    <!-- Update Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-success updateUser">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>

    <script>
        // Initialize Firebase
        var config = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}",
            measurementId: "{{ config('services.firebase.measurement_id') }}"
        };
        firebase.initializeApp(config);
        firebase.analytics();

        var lastIndex = 0;

        // Get Data
        function getData(filter='', status='')
        {

            firebase
                .firestore()
                .collection("users")
                .onSnapshot((snapshot) => {
                    let data = snapshot.docs.map((doc) => ({
                        id: doc.id,
                        ...doc.data(),
                    }));
                    // console.log("All data in 'books' collection", data);

                    var htmls = [];

                    if(status !== ''){
                        data = data.filter((item)=> {
                            return item.isbasicuser === status
                        })
                    }
                    console.log(data)

                    if(filter !== '') {
                        data = data.filter((item) => {
                            if(item.username === '' || item.businessname === '' || item.username === undefined || item.businessname === undefined) return false
                            return String(item.username).indexOf(filter) !== -1 || String(item.businessname).indexOf(filter) !== -1
                        })
                    }

                    $.each(data, function (index, value) {
                        if (value) {
                            htmls.push('<tr>\
                    <td>' + value.username + '</td>\
                    <td>' + value.businessname + '</td>\
                    <td>' + value.phonenumber + '</td>\
                    <td>' + value.email + '</td>\
                    <td>' + value.countryname + '</td>\
                    <td>' + value.isbasicuser + '</td>\
                    <td>' + (value.isverified ? 'Verified' : 'Not Verified') + '</td>\
                    <td><a href="#" data-toggle="modal" data-target="#update-modal" class="updateData" data-id="' + value.id + '"><i class=" os-icon os-icon-ui-49"></i></a>\
                    <a href="#" data-toggle="modal" data-target="#remove-modal" class="danger removeData" style="color: red !important;" data-id="' + value.id + '"><i class="os-icon os-icon-ui-15"></i></a></td>\
                </tr>');
                        }
                        lastIndex = index;
                    });

                    $('#tbody').html(htmls);

                });

        }

        function pagination(){
            $('body.table-lightborder').DataTable({
                "order": [[0, 'desc' ]]
            });
        }

        getData();

        $('#select-status').change(function(e) {
            const status = $(this).val();
            const searchString = $('#search-value').val();
            getData(searchString, status);
        })

        $('#search-value').on('input', function(e) {
            const searchString = $(this).val();
            const status = $('#select-status').val();
            getData(searchString, status);
        })

        // Add Data
        $('#submitUser').on('click', function () {
            var values = $("#addUser").serializeArray();
            var name = values[0].value;
            var email = values[1].value;
            var userID = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Users/' + userID).set({
                name: name,
                email: email,
            });

            // Reassign lastID value
            lastIndex = userID;
            $("#addUser input").val("");
        });

        // Update Data
        var updateID = 0;
        var closeButtons =$('.close');

        $('body').on('click', '.updateData', function () {
            updateID = $(this).attr('data-id');
            const userRef = firebase
                .firestore()
                .collection("users")
                .doc(updateID)

            userRef.get().then((doc) => {
                if (!doc.exists) return;
                console.log("Document data:", doc.data());
                const document = doc.data()
                var updateData = '<div class="form-group">\
                    <label for="username" class="col-md-12 col-form-label">User Name</label>\
                    <div class="col-md-12">\
                        <input id="username" type="text" class="form-control" name="username" value="' + document.username + '" disabled autofocus>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <label for="isbasicuser" class="col-md-12 col-form-label">Account Type</label>\
                    <div class="col-md-12">\
                    <select class="form-control" id="isbasicuser" name="isbasicuser" required>\
                        <option value="Basic"' + (document.isbasicuser == "Basic" ? "selected" : "") + '>Basic</option>\
                        <option value="Premium"' + (document.isbasicuser == "Premium" ? "selected" : "") + '>Premium</option>\
                        <option value="Business pro"' + (document.isbasicuser == "Business pro" ? "selected" : "") + '>Business pro</option>\
                    </select>\
                    </div>\
                 </div>\
                <div class="form-group">\
                    <label for="isverified" class="col-md-12 col-form-label">Account Status</label>\
                    <div class="col-md-12">\
                        <select class="form-control" id="isverified" name="isverified">\
                            <option value="true"'+ (document.isverified ? "selected":"") +'>Verified</option>\
                            <option value="false"'+ (!document.isverified ? "selected":"") +'>Not Verified</option>\
                        </select>\
                    </div>\
                </div>';

                $('#updateBody').html(updateData);
            });

        });

        $('.updateUser').on('click', function () {
            var values = $(".users-update-record-model").serializeArray();
            var postData = {
                isbasicuser: values[0].value,
                isverified: values[1].value === "true",
            };
            console.log(postData)

            const userRef = firebase
                .firestore()
                .collection("users")
                .doc(updateID)

            userRef
                .update(postData)
                .then(() => {
                    console.log('user data updated')
                })

            closeButtons.trigger('click');
        });

        // Remove Data
        $("body").on('click', '.removeData', function () {
            var id = $(this).attr('data-id');
            $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
        });

        $('.deleteRecord').on('click', function () {
            var values = $(".users-remove-record-model").serializeArray();
            var id = values[0].value;

            firebase
                .firestore()
                .collection("users")
                .doc(id)
                .delete()
                .then(() => {
                    console.log("user data deleted")
                })
                .catch((error) => console.error("Error deleting document", error));

            $('body').find('.users-remove-record-model').find("input").remove();
            closeButtons.trigger('click');
        });

        $('.remove-data-from-delete-form').click(function () {
            $('body').find('.users-remove-record-model').find("input").remove();
        });
    </script>
@endsection
