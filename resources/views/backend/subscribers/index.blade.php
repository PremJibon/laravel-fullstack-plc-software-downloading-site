@extends('backend.layouts.app')

@php

//var_dump($subscribers);
//return;

@endphp

@section('content')
    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Subscribers</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a  id="downloadBtn" href="{{ route('patbd.subscriber.download') }}" class="btn btn-success text-white">Download
                                as TXT</a>
                        </div>
                        {{-- <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('patbd.subscriber.create') }}">
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

        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div id="filters">
                                <label for="dateRange">Date Range:</label>
                                <select id="dateRange">
                                    <option value="" >All</option>
                                    <option value="daily" {{  $dateRange == 'daily' ? 'selected': ''; }}>Daily</option>
                                    <option value="weekly" {{  $dateRange == 'weekly' ? 'selected': ''; }}>Weekly</option>
                                    <option value="monthly" {{  $dateRange == 'monthly' ? 'selected': ''; }}>Monthly</option>
                                    <option value="yearly" {{  $dateRange == 'yearly' ? 'selected': ''; }}>Yearly</option>
                                </select>
                            </div>
                            <div class="table-responsive">
                            <table id="table_id" class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscribers as $subscriber)
                                        <tr>
                                            <td class="cell">{{ $subscriber->id }}</td>
                                            <td class="cell"><span>{{ $subscriber->email }}</span></td>
                                            <td class="cell"><span>{{ $subscriber->created_at }}</span></td>
                                            <td class="cell">
                                                <form id="deleteSubscriberForm_{{ $subscriber->id }}" action="{{ route('patbd.subscriber.destroy', ['subscriber' => $subscriber->id]) }}"
                                                    class="d-inline-block" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="deleteSubscriber({{ $subscriber->id }}); return false;" class="btn app-btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->

                    </div><!--//app-card-body-->
                </div><!--//app-card-->
                <nav class="app-pagination">
                    <div class="mx-auto">
                        {{ $subscribers->links() }}
                    </div>
                </nav>

            </div><!--//tab-pane-->
        </div><!--//tab-content-->



    </div><!--//container-fluid-->
@endsection



@section('custom_script')

    <script>
            // for date range filter
            $('#dateRange').change(function(e) {
                e.preventDefault();
                // Get the filter values
                var dateRange = $('#dateRange').val();
                
                
                // Construct the download URL with filters as query parameters
                var downloadUrl = "{{ route('patbd.subscriber.index') }}?dateRange=" + dateRange; 
                // var downloadUrl = "{{ route('patbd.user.index') }}?page={{ Request::get('page') }}&dateRange=" + dateRange + "&country=" + country;

                // Redirect to the download URL
                window.location.href = downloadUrl;
            });

            // download filter for date range
             
            $(document).ready(function () {
                $('#downloadBtn').click(function (e) {
                    e.preventDefault();
                    
                    // Get the filter values
                    var dateRange = $('#dateRange').val();
                  
                    
                    // Construct the download URL with filters as query parameters
                    var downloadUrl = "{{ route('patbd.subscriber.download') }}";
                    downloadUrl += '?dateRange=' + dateRange;

                    // Redirect to the download URL
                    window.location.href = downloadUrl;
                });
            });






        // Define deleteSubscriber function in the global scope
        function deleteSubscriber(subscriberId) {

            if(confirm('are you sure?') == true){
                document.getElementById( 'deleteSubscriberForm_' + subscriberId ).submit();
            }else{
                return false;
            }
        }



        $(document).ready(function () {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Event listeners for the filters
            $('#dateRange').change(function() {
                var dateRange = $('#dateRange').val();
                    var createdAt = new Date(data[4]); // Assuming 'created_at' is the 6th column

                    if (dateRange) {
                        var now = new Date();
                        switch (dateRange) {
                            case 'daily':
                                var dayAgo = new Date();
                                dayAgo.setDate(dayAgo.getDate() - 1);
                                if (createdAt < dayAgo || createdAt > now) return false;
                                break;
                            case 'weekly':
                                var weekAgo = new Date();
                                weekAgo.setDate(weekAgo.getDate() - 7);
                                if (createdAt < weekAgo || createdAt > now) return false;
                                break;
                            case 'monthly':
                                var monthAgo = new Date();
                                monthAgo.setMonth(monthAgo.getMonth() - 1);
                                if (createdAt < monthAgo || createdAt > now) return false;
                                break;
                            case 'yearly':
                                var yearAgo = new Date();
                                yearAgo.setFullYear(yearAgo.getFullYear() - 1);
                                if (createdAt < yearAgo || createdAt > now) return false;
                                break;
                        }
                    }

                    return true;
            });
        });

    </script>

@endsection