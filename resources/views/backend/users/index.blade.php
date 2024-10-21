@extends('backend.layouts.app')

@section('content')

    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Users</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a id="downloadBtn" class="btn btn-success text-white">Download
                                as TXT</a>
                        </div>
                        {{-- <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('patbd.user.create') }}">
                                <i class="bi bi-plus-square"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square me-1" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                Create New
                            </a>
                        </div> --}}
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- custom notification  -->
        <div id="notification_area">
    
        </div>



        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive p-3">
                            <div id="filters">
                                <label for="dateRange">Date Range:</label>
                                <select id="dateRange">
                                    <option value="" >All</option>
                                    <option value="daily" {{  $dateRange == 'daily' ? 'selected': ''; }}>Daily</option>
                                    <option value="weekly" {{  $dateRange == 'weekly' ? 'selected': ''; }}>Weekly</option>
                                    <option value="monthly" {{  $dateRange == 'monthly' ? 'selected': ''; }}>Monthly</option>
                                    <option value="yearly" {{  $dateRange == 'yearly' ? 'selected': ''; }}>Yearly</option>
                                </select>
                            
                                <label for="countryFilter">Country:</label>
                                <select id="countryFilter">
                                    <option value="">All</option>
                                    @php
                                    $all_countries_array = [];
                                    foreach ($all_countries as $single_country){
                                        if( $single_country != '' && !in_array($single_country, $all_countries_array) ){
                                            $selected = '';
                                            if($single_country == $country){
                                                $selected = 'selected';
                                            }
                                    @endphp
                                        <option value="{{ $single_country }}" {{ $selected; }}>{{ $single_country }}</option>
                                    @php
                                            array_push($all_countries_array, $single_country);
                                        }
                                    }
                                    @endphp
                                </select>

                                <div class="d-inline-block" style="margin-left: 10px;">
                                    <button id="addToManyOpenModal" class="btn btn-success text-white" data-mdb-toggle="modal" data-mdb-target="#addToManyModal" > Add Note To Many </button>
                                </div>


                            </div>
                            <table id="user_table" class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                  
                                        <th><input type="checkbox" id="select_all"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Country Name</th>
                                        <th>Added date</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><input type="checkbox" name="select_row[]" class='select_row' value="{{ $user->id }}"></td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->country_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y h:i A') }}</td>
                                            <td>
                                                @if($user->dial_code && $user->mobile)
                                                    <div class="contact-container">
                                                        {{-- <a href="https://api.whatsapp.com/send/?phone={{ $user->dial_code . $user->mobile }}" target="_blank" class="contact-link">
                                                        {{ $user->dial_code . $user->mobile }}
                                                        </a> --}}
                                                        
                                                        <a id='number_link' href="https://api.whatsapp.com/send/?phone={{ $user->dial_code . $user->mobile }}" 
                                                            target="_blank" class="contact-link">
                                                             {{ $user->dial_code . $user->mobile }}
                                                         </a>
                                                         
                                                        
                                                        <div class="contact-options">
                                                            <a href="weixin://dl/chat?{{ $user->dial_code . $user->mobile }}" target="_blank">WeChat</a>
                                                            <a href="https://t.me/{{ $user->dial_code . $user->mobile }}" target="_blank">Telegram</a>
                                                            <a href="https://wa.me/{{ $user->dial_code . $user->mobile }}" target="_blank">WhatsApp</a>
                                                        </div>
                                                    </div>
                                                @elseif($user->mobile)
                                                    <a href="tel:{{ $user->mobile }}">{{ $user->mobile }}</a>
                                                @endif
                                            </td>
                                            <td >
                                                <!-- <button onclick="deleteUser({{ $user->id }})" class="btn btn-danger" style="cursor: pointer">Delete</button> -->
                                                <form id="deleteReviewForm_{{ $user->id }}" action="{{ route('patbd.user.destroy', ['user' => $user->id]) }}"
                                                    class="d-inline-block" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="deleteUser({{ $user->id }}); return false;" class="btn app-btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="auth-form login-form d-flex flex-wrap justify-content-center align-items-center" action="{{ route('patbd.user.addNote') }}" method="POST">
                                                    @csrf
                                                    <textarea name="user_note"  minlength="10" maxlength="250" required>{{ $user->note }}</textarea>
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div><!--//app-card-body-->
                </div><!--//app-card-->
                <nav class="app-pagination">
                    <div class="mx-auto">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                    {{-- <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}


                </nav><!--//app-pagination-->

            </div><!--//tab-pane-->
        </div><!--//tab-content-->



    </div><!--//container-fluid-->


    <div class="modal fade" id="addToManyModal" tabindex="-1" aria-labelledby="addToManyModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Add Note To Many Users</h1>
                    <button type="button" id="addToManyModalClose" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea id="add_user_note" name="add_user_note" minlength="10" maxlength="250" class="form-control" style="min-height: 150px"  ></textarea>
                    </div>
                    <div id="empty_note_error">

                    </div>
                    <div class="form-group text-center mt-3">
                        <button type="submit" id="addToMany" class="btn btn-success text-white" >Save</button>
                    </div>
                </div>
            </div>
        </div>
    <div>



@endsection

@section('custom_script')

    <!-- jquery js  -->
    <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>


    <script>

        // Define deleteUser function in the global scope
        function deleteUser(userId) {
            if (confirm("are you sure you want to delete this user?") == true) {
                document.getElementById( 'deleteReviewForm_' + userId ).submit();
            }else{
                return false;
            }
        }

            
            $(document).ready(function () {
                $('#downloadBtn').click(function (e) {
                    e.preventDefault();
                    
                    // Get the filter values
                    var dateRange = $('#dateRange').val();
                    var country = $('#countryFilter').val();
                    
                    // Construct the download URL with filters as query parameters
                    var downloadUrl = "{{ route('patbd.user.download') }}";
                    downloadUrl += '?dateRange=' + dateRange + '&country=' + country;

                    // Redirect to the download URL
                    window.location.href = downloadUrl;
                });
            });


  
            // Event listeners for the filters
            $('#dateRange, #countryFilter').change(function(e) {
                e.preventDefault();
                // Get the filter values
                var dateRange = $('#dateRange').val();
                var country = $('#countryFilter').val();
                
                // Construct the download URL with filters as query parameters
                var downloadUrl = "{{ route('patbd.user.index') }}?dateRange=" + dateRange + "&country=" + country;
                // var downloadUrl = "{{ route('patbd.user.index') }}?page={{ Request::get('page') }}&dateRange=" + dateRange + "&country=" + country;

                // Redirect to the download URL
                window.location.href = downloadUrl;
            });


            // initializing 
            var selected_rows;
            var add_user_note;
            var all_selected_users;

            $("#addToManyOpenModal").click(function(e){
                e.preventDefault();
                $("#notification_area").html('');
                $(".alert .btn-close").click();
                selected_rows = [];
                selected_rows = $('.select_row:checked');
                if(selected_rows.length == 0){
                    setTimeout(function(){
                        $('#addToManyModalClose').click();
                        $("#notification_area").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please Select At Least One Item From The Left Column!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }, 1000);
                }
            });

            $("#addToMany").click(function(e){
                e.preventDefault();
                $('#empty_note_error').html('');
                $("#notification_area").html('');
                $(".alert .btn-close").click();
                add_user_note = $('#add_user_note').val();
                if(add_user_note == ''){
                    setTimeout(function(){
                        $('#empty_note_error').html('<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Please Write A Note!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }, 500);
                    return;
                }
                if(add_user_note.length < 10){
                    setTimeout(function(){
                        $('#empty_note_error').html('<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Please put at least 10 characters!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }, 500);
                    return;
                }
                $('#addToManyModalClose').click();
                all_selected_users = [];
                for (let i = 0; i < selected_rows.length; i++) {
                    all_selected_users.push(parseInt(selected_rows[i].value));
                }
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('patbd.user.addNoteToMany') }}", // Adjust the route syntax here
                    method: "POST",
                    data: {
                        _token: csrfToken,
                        all_selected_users,
                        add_user_note
                    },
                    success: function(response) {
                        $("#notification_area").html('<div class="success_message alert alert-success alert-dismissible fade show" role="alert">'+response+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

                        // initializing
                        var remaining_time = 4;
                        var previous_message;
                        const myInterval = setInterval(myTimer, 1000);
                        function myTimer() {
                            $(".success_message").html(response + ' This page will be reloaded within ' + remaining_time + ' seconds...');
                            remaining_time--;
                        }
                        function myStop() {
                            clearInterval(myInterval);
                        }

                        setTimeout(function(){
                            myStop();
                            window.location.reload();
                        }, 5000);
                    },
                    error: function(xhr, status, error) {
                        $("#notification_area").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">An error occurred while saving the note.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }
                });

                all_selected_users = [];
                $('#add_user_note').val('');

            });

            // checked function
            $('#select_all').on('change', function() {
                let isChecked = this.checked;

                // Select or deselect all checkboxes
                $('.select_row').each(function() {
                    $(this).prop('checked', isChecked);
                });

                // Optionally, you can send an AJAX request to process the selected rows
                let selectedIds = [];
                if (isChecked) {
                    $('.select_row').each(function() {
                        selectedIds.push($(this).val()); // Collect all user IDs
                    });
                }
            });

            $(document).ready(function() {
    $('#number_link').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Toggle the visibility of the contact-options div
        $(this).siblings('.contact-options').toggle();
    });
});




    </script>
    
@endsection