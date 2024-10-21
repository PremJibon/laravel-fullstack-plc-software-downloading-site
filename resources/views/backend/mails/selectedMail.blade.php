@extends('backend.layouts.app')

@section('content')
    <div class="container-xl">
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12 mb-4">
                <h1 class="app-page-title mb-0">Email Campaign (Selected Mail)</h1>
            </div>
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="app-auth-body ">
                    <h2 class="auth-heading text-center mb-5">Send Email To Selected Mail</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="{{ route('patbd.mails.sendSelectedMail') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                            <label class="mb-2" for="emails">FROM Mail Servers <span class="text-danger text-sm">(Selected mail servers will be randomly used. If none selected here, the default mail server from the .env file will be used. )</span></label>

                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check_all">
                                    <label class="form-check-label" for="check_all">
                                        Check All
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-content-center flex-wrap">

                                @php
                                if( count($emailservers) > 0 ){
                                    foreach ($emailservers as $emailserver_key=>$emailserver){
                                @endphp
                                <div class="form-check" style="margin-right: 30px;">
                                    <input class="emailservers form-check-input" type="checkbox" name="emailservers[]" value="{{ $emailserver->id; }}" id="flexCheckDefault_{{ $emailserver->id; }}">
                                    <label class="form-check-label" for="flexCheckDefault_{{ $emailserver->id; }}">
                                        {{ $emailserver->title == "" ? $emailserver->MAIL_USERNAME : $emailserver->title;  }}
                                    </label>
                                </div>
                                @php
                                    }
                                }else{
                                @endphp

                                    <span class="text-danger text-sm">There are no Email Servers Saved. The Default One From The .env File Will Be Used</span>

                                @php
                                }
                                @endphp

                            </div>
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="emails">TO <span class="text-danger text-sm"></span></label>
                                <textarea name="emails" id="emails" class="form-control" style="min-height: 150px"></textarea>
                                @error('emails')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="mb-3">From
                                <label class="mb-2" for="subject">Subject</label>
                                <input id="subject" name="subject" type="text" class="form-control"
                                    placeholder="Email Subject" required="required">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="body">Body</label>
                                <textarea name="body" id="body" class="ckeditor form-control" style="min-height: 150px"></textarea>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Send To All Selected
                                    Subscribers</button>
                            </div>
                            @if (Session::has('error'))
                                <div class="text-center mt-2">
                                    <span class="text-danger">{{ Session::get('error') }}</span>
                                </div>
                            @endif

                        </form>

                        {{-- <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link"
                                href="signup.html">here</a>.</div> --}}
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->
            </div>


        </div><!--//row-->


    </div><!--//container-fluid-->
@endsection



@section('custom_script')

<script>
    $("#check_all").click(function(){
        $('.emailservers').not(this).prop('checked', this.checked);
    });
</script>


@endsection