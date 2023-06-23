<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login|Admin</title>
    @include('Admin.inc.head')
</head>

<body>

   <!-- BEGIN LOADER -->
   <div id="load_screen">
     <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
     </div>
    </div>
<!--  END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>{{ __('auth.signIn') }}</h2>
                                <p>{{ __('auth.credential') }}</p>

                            </div>


                            <form method="POST" action="{{ route('admin.auth.login') }}">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('auth.email') }}</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">{{ __('auth.password') }}</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-secondary w-100">{{ __('auth.signIn') }}</button>
                                    </div>
                                </div>
                        </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


@include('Admin.inc.footer')


</body>
