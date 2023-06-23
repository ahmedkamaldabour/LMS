@extends('Admin.inc.master')

@section('title')
    {{__('lesson.edit')}}
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="{{asset('assetsAdmin/src/plugins/css/light/editors/markdown/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsAdmin/src/plugins/css/dark/editors/markdown/simplemde.min.css')}}">
    <!-- END PAGE LEVEL STYLE -->
@endpush
@section('content')
    @php
        $types= ['video', 'file', 'text'];
    @endphp
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('lesson.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.lessons.create') }}">{{ __('lesson.add') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$lesson->slug }}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->
                <div class="statbox widget box box-shadow mt-lg-5">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center"> {{__('lesson.edit')}} </h4>
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
                            <form method="POST" enctype="multipart/form-data" enctype="multipart/form-data"
                                  action="{{route('admin.lessons.update' , $lesson)}}">
                                @csrf
                                @method('PUT')
                                @include('Admin.pages.lessons.Form')
                                <button type="submit" class="btn btn-primary mt-3">{{__('lesson.edit')}}</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection


