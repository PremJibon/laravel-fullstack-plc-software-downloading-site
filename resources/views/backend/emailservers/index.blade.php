@extends('backend.layouts.app')

@section('content')
    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Email Servers</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form class="table-search-form row gx-1 align-items-center" method="get"
                                action="{{ route('patbd.blog.search') }}">
                                @csrf
                                <div class="col-auto">
                                    <input type="text" id="search-orders" name="search"
                                        class="form-control search-orders" placeholder="Search">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn app-btn-secondary">Search</button>
                                </div>
                            </form>

                        </div><!--//col-->
                        <div class="col-auto">
                            <select class="form-select w-auto">
                                <option selected value="option-1">All</option>
                                <option value="option-2">This week</option>
                                <option value="option-3">This month</option>
                                <option value="option-4">Last 3 months</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('patbd.emailservers.create') }}">
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
                        </div>
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
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">ID</th>
                                        <th class="cell">Title</th>
                                        <th class="cell">MAIL MAILER</th>
                                        <th class="cell">MAIL HOST</th>
                                        <th class="cell">MAIL PORT</th>
                                        <th class="cell">MAIL ENCRYPTION</th>
                                        <th class="cell">MAIL FROM ADDRESS</th>
                                        <th class="cell">MAIL FROM NAME</th>
                                        <th class="cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emailservers as $emailserver)
                                        <tr>
                                            <td class="cell">{{ $emailserver->id }}</td>
                                            <td class="cell"><span class="truncate">{{ $emailserver->title }}</span></td>
                                            <td class="cell">{{ $emailserver->MAIL_MAILER }}</td>
                                            <td class="cell">{{ $emailserver->MAIL_HOST }}</td>
                                            <td class="cell">{{ $emailserver->MAIL_PORT }}</td>
                                            <td class="cell">{{ $emailserver->MAIL_ENCRYPTION }}</td>
                                            <td class="cell"><span class="truncate">{{ $emailserver->MAIL_FROM_ADDRESS }}</span></td>
                                            <td class="cell"><span class="truncate">{{ $emailserver->MAIL_FROM_NAME }}</span></td>

                                            <td class="cell">
                                                <a class="btn app-btn-info"
                                                    href="{{ route('patbd.emailservers.edit', ['emailserver' => $emailserver->id]) }}">Edit</a>
                                                <form id="deleteEmailServerForm_{{ $emailserver->id }}" action="{{ route('patbd.emailservers.destroy', ['emailserver' => $emailserver->id]) }}"
                                                    class="d-inline-block" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="deleteEmailserver({{ $emailserver->id }}); return false;" class="btn app-btn-danger">Delete</button>
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
                        {{ $emailservers->links() }}
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
@endsection


@section('custom_script')

<script>
    function deleteEmailserver(emailserver_id){
        if(confirm('are you sure?') == true){
            document.getElementById( 'deleteEmailServerForm_' + emailserver_id ).submit();
        }else{
            return false;
        }
    }
</script>


@endsection