@extends('backend.layouts.app')

@section('content')
    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12 mb-4">
                <h1 class="app-page-title mb-0">Create Server</h1>
            </div>
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="app-auth-body">
                    <h2 class="auth-heading text-center mb-5">Create Server</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="{{ route('patbd.emailservers.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="mb-2" for="title">Title</label>
                                <input id="title" name="title" type="text" class="form-control" placeholder="Server Title"  maxlength="50" required="required">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_MAILER">Mail Mailer</label>
                                <select id="MAIL_MAILER" name="MAIL_MAILER" class="form-select" required>
                                    <option value="smtp">SMTP</option>
                                    <option value="imap">IMAP</option>
                                    <option value="pop">POP</option>
                                </select>
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_HOST">Mail Host</label>
                                <input id="MAIL_HOST" name="MAIL_HOST" type="text" class="form-control" placeholder="Mail Server IP Address" maxlength="50" required>
                                @error('MAIL_HOST')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->
                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_PORT">Mail Port</label>
                                <input id="MAIL_PORT" name="MAIL_PORT" type="number" class="form-control" placeholder="Mail Port" step="1" min="0" max="999" required>
                                @error('MAIL_PORT')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->
                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_USERNAME">Mail Username</label>
                                <input id="MAIL_USERNAME" name="MAIL_USERNAME" type="text" class="form-control" placeholder="Mail Username" maxlength="50" required>
                                @error('MAIL_USERNAME')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->
                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_PASSWORD">Mail Password</label>
                                <input id="MAIL_PASSWORD" name="MAIL_PASSWORD" type="password" class="form-control" placeholder="Mail Password" maxlength="50" required>
                                @error('MAIL_PASSWORD')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_ENCRYPTION">Mail Encryption</label>
                                <select id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" class="form-select" required>
                                    <option value="SSL">SSL</option>
                                    <option value="TLS">TLS</option>
                                    <option value="PGP">PGP</option>
                                </select>
                            </div><!--//form-group-->

                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_FROM_ADDRESS">Mail From Address</label>
                                <input id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" type="email" class="form-control" placeholder="Mail From Address" maxlength="50" required>
                                @error('MAIL_FROM_ADDRESS')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->
                            <div class="mb-3">
                                <label class="mb-2" for="MAIL_FROM_NAME">Mail From Name</label>
                                <input id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" type="text" class="form-control" placeholder="Mail From Name" maxlength="50" value="{{ get_settings('app_name'); }}" required>
                                @error('MAIL_FROM_NAME')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!--//form-group-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Create Server</button>
                            </div>
                            @if (Session::has('success'))
                                <div class="text-center mt-2">
                                    <span class="text-success">{{ Session::get('success') }}</span>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="text-center mt-2">
                                    <span class="text-danger">{{ Session::get('error') }}</span>
                                </div>
                            @endif

                        </form>
                    </div><!--//auth-form-container-->
                </div><!--//app-auth-body-->
            </div>
        </div><!--//row-->

    </div><!--//container-fluid-->
@endsection
