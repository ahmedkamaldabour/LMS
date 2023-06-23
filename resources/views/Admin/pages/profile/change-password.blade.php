
@extends('Admin.inc.master')

@section('title')
    Change Password
@endsection

    @push('css')
        <link href="{{asset('assetsAdmin/src/assets/css/light/authentication/auth-boxed.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetsAdmin/src/assets/css/dark/authentication/auth-boxed.css')}}" rel="stylesheet" type="text/css" />
    @endpush



@section('content')

        <div class="auth-container d-flex align-items-center justify-content-center mt-md-5 mx-auto">

            <div class="container ">

                <div class="row">

                    <div class="col-xl-8 d-flex flex-column mx-auto">
                        <div class="card mt-3 mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h2>Change Password</h2>
                                    </div>
                                    <form action="{{route('profile.update_password')}}" method="POST">
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Current Password</label>
                                                <input name="old_password" type="password" class="form-control add-billing-address-input">
                                            </div>
                                            <div>
                                                @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input name="password" type="password" class="form-control">
                                            </div>
                                            <div>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input name="password_confirmation" type="password" class="form-control">
                                            </div>
                                            <div>
                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <button class="btn btn-secondary w-100">Update Password</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">Already have an account ? <a href="javascript:void(0);" class="text-warning">Sign in</a></p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>


@endsection

@push('scripts')
    <script src="{{asset('assetsAdmin/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endpush
@include('sweetalert::alert')
