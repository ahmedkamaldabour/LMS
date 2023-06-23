@extends('Admin.inc.master')
@section('title')
   Edit Category
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('posts.home') }}</a></li>
                            <li class="breadcrumb-item " aria-current="page"><a href="{{route('admin.category.index')}}">{{ __('category.categories') }}</a></li>
                            <li class="breadcrumb-item active">{{__("category.edit")}}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->
                <div class="statbox widget box box-shadow mt-lg-5">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center"> {{__('category.edit')}} </h4>
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

                            <form action="{{route('admin.category.update',$category)}}" method="post">
                                @method('PUT')
                                <div class="card-body">
                                    @include('Admin.pages.category.inc._form')
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-success"> {{__('category.edit')}} </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
