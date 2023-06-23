@extends('Admin.inc.master')

@section('title')
    {{__('posts.add_post')}}
@endsection
@push('css')
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="{{asset('assetsAdmin/src/plugins/css/light/editors/markdown/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsAdmin/src/plugins/css/dark/editors/markdown/simplemde.min.css')}}">
    <!-- END PAGE LEVEL STYLE -->

@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('posts.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">{{ __('posts.posts') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('posts.add_post') }}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->
                <div class="statbox widget box box-shadow mt-lg-5">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center"> {{__('posts.add_post')}} </h4>
                                <style>
                                    h4 {
                                        font-family: "Arabic Typesetting";
                                        font-style: italic;
                                        font-size: 50px;
                                        background-image: linear-gradient(102deg, #ff5959, #000000);
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="widget-content widget-content-area">

                            <form action="{{route('admin.posts.store')}}"  enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    @include('Admin.pages.blog.posts.inc._form')
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-success"> {{__('posts.add_post')}} </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assetsAdmin/src/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assetsAdmin/src/plugins/src/editors/markdown/simplemde.min.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key)

        <script>
            new SimpleMDE({
                element: document.getElementById("post_{{$key}}"),
                spellChecker: false,
            });
        </script>
    @endforeach
@endpush
