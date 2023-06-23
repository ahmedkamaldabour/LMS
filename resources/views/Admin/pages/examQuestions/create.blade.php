@extends('Admin.inc.master')

@section('title')
    {{__('examQuestions.create')}}
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet"
          href="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsAdmin') }}/src/plugins/src/tagify/tagify.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assetsAdmin') }}/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assetsAdmin') }}/src/plugins/css/light/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assetsAdmin') }}/src/plugins/css/light/tagify/custom-tagify.css">
    <link href="{{ asset('assetsAdmin') }}/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet"
          type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assetsAdmin') }}/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assetsAdmin') }}/src/plugins/css/dark/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assetsAdmin') }}/src/plugins/css/dark/tagify/custom-tagify.css">
    <link href="{{ asset('assetsAdmin') }}/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@endpush

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <!--  BEGIN BREADCRUMBS  -->
                <div class="secondary-nav">
                    <div class="breadcrumbs-container" data-page-heading="Analytics">
                        <header class="header navbar navbar-expand-sm">
                            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-menu">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </a>
                            <div class="d-flex breadcrumb-content">
                                <div class="page-header">

                                    <div class="page-title">
                                    </div>

                                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">App</a></li>
                                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>
                            <ul class="navbar-nav flex-row ms-auto breadcrumb-action-dropdown">
                                <li class="nav-item more-dropdown">
                                    <div class="dropdown  custom-dropdown-icon">
                                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span>Settings</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-chevron-down custom-dropdown-arrow">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">

                                            <a class="dropdown-item" data-value="Settings"
                                               data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-settings&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><path d=&quot;M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z&quot;></path></svg>"
                                               href="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-settings">
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path
                                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                </svg>
                                                Settings
                                            </a>

                                            <a class="dropdown-item" data-value="Mail"
                                               data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-mail&quot;><path d=&quot;M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z&quot;></path><polyline points=&quot;22,6 12,13 2,6&quot;></polyline></svg>"
                                               href="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-mail">
                                                    <path
                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>
                                                Mail
                                            </a>

                                            <a class="dropdown-item" data-value="Print"
                                               data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-printer&quot;><polyline points=&quot;6 9 6 2 18 2 18 9&quot;></polyline><path d=&quot;M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2&quot;></path><rect x=&quot;6&quot; y=&quot;14&quot; width=&quot;12&quot; height=&quot;8&quot;></rect></svg>"
                                               href="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-printer">
                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                    <path
                                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                </svg>
                                                Print
                                            </a>

                                            <a class="dropdown-item" data-value="Download"
                                               data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-download&quot;><path d=&quot;M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4&quot;></path><polyline points=&quot;7 10 12 15 17 10&quot;></polyline><line x1=&quot;12&quot; y1=&quot;15&quot; x2=&quot;12&quot; y2=&quot;3&quot;></line></svg>"
                                               href="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-download">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                    <polyline points="7 10 12 15 17 10"></polyline>
                                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                                </svg>
                                                Download
                                            </a>

                                            <a class="dropdown-item" data-value="Share"
                                               data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-share-2&quot;><circle cx=&quot;18&quot; cy=&quot;5&quot; r=&quot;3&quot;></circle><circle cx=&quot;6&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><circle cx=&quot;18&quot; cy=&quot;19&quot; r=&quot;3&quot;></circle><line x1=&quot;8.59&quot; y1=&quot;13.51&quot; x2=&quot;15.42&quot; y2=&quot;17.49&quot;></line><line x1=&quot;15.41&quot; y1=&quot;6.51&quot; x2=&quot;8.59&quot; y2=&quot;10.49&quot;></line></svg>"
                                               href="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-share-2">
                                                    <circle cx="18" cy="5" r="3"></circle>
                                                    <circle cx="6" cy="12" r="3"></circle>
                                                    <circle cx="18" cy="19" r="3"></circle>
                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                </svg>
                                                Share
                                            </a>

                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </header>
                    </div>
                </div>
                <!--  END BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.index') }}">{{ __('examQuestions.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('admin.examQuestions.index') }}">{{ __('examQuestions.examQuestions') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('examQuestions.create') }}</li>
                        </ol>
                    </nav>
                </div>
                <form action="{{ route('admin.examQuestions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="statbox widget box box-shadow mt-lg-3">
                        <div class="row">
                            <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                                <div class="widget-content widget-content-area blog-create-section mt-4">

                                    <h5 class="mb-4">{{ __('examQuestions.addExamQuestions') }}</h5>

                                    <div class="row mb-4">
                                        <div class="col-xxl-24">
                                            <label
                                                for="post-meta-description">{{ __('examQuestions.question') }}</label>
                                            <textarea name="question" class="form-control" id="post-meta-description"
                                                      cols="10" rows="5"></textarea>
                                        </div>
                                    </div>
                                    @error('question')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                                <div class="widget-content widget-content-area blog-create-section">


                                    <div class="row">

                                        <div class="col-xxl-12 mb-4">
                                            <div class="switch form-switch-custom switch-inline form-switch-primary">
                                                <input class="switch-input" name="active" type="checkbox" role="switch"
                                                       id="showPublicly" checked>
                                                <label class="switch-label" for="showPublicly">
                                                    {{ __('examQuestions.active') }}
                                                </label>
                                            </div>

                                        </div>
                                        @error('active')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                        <div class="col-xxl-12 col-md-12 mb-4">
                                            <label for="exam">Exam</label>
                                            <select class="form-control" name="exam_id">
                                                <option>{{ __('examQuestions.choose') }}</option>
                                                @foreach ($exams as $exam)
                                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('exam_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="col-xxl-12 col-md-12 mb-4">

                                            <label for="product-images">
                                                {{ __('examQuestions.image') }}
                                            </label>
                                            <div class="multiple-file-upload">
                                                <input type="file"
                                                       class="form-control"
                                                       name="question_image"
                                                       id="producimages">
                                            </div>
                                        </div>
                                        @error('question_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                            <button
                                                class="btn btn-success w-100">{{ __('examQuestions.addExamQuestions') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection

@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/editors/quill/quill.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script
        src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>

    <script src="{{ asset('assetsAdmin') }}/src/plugins/src/tagify/tagify.min.js"></script>

    <script src="{{ asset('assetsAdmin') }}/src/assets/js/apps/blog-create.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

@endpush
