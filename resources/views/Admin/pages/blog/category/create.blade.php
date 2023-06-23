@extends('Admin.inc.master')

@section('title')
    Create Blog Category
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('blog_category.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.blog_category.index') }}">{{ __('blog_category.all') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('blog_category.create') }}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->
                <div class="statbox widget box box-shadow mt-lg-3">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4 class="text-center"> {{__('blog_category.add_category')}} </h4>
                                    <style>
                                        h4 {
                                            font-style: normal;
                                            font-size: 30px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    <div class="card">
                    <div class="widget-content widget-content-area">

                        <form action="{{route('admin.blog_category.store')}}"  enctype="multipart/form-data" method="post">
                            <div class="card-body">
                                @include('Admin.pages.blog.category.inc._form')
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-success"> {{__('blog_category.add_category')}} </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
