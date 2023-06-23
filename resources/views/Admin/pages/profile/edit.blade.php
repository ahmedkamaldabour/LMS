
@extends('Admin.inc.master')

@section('title')
    Profile Edit
@endsection

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    @include('Admin.pages.profile.inc.custom_style')
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container mx-auto" id="container">
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content ">
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h3>Profile Settings</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="section general-info" action="{{route('profile.update',$profile)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="info row">
                            <div class="col-md-6">


                                <div>
                                    <img src="{{asset('images/profileImages/'.auth()->user()->profile->image)}}" class="img-thumbnail" alt="Profile Image" style="width: 200px;height: 200px;border-radius: 50%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label >Image</label>
                                <input type="file" name="image" id="input-file-now-custom-3" class="form-control mb-4">

                                <label for="phone">Phone</label>
                                <input value="{{$profile->phone}}" type="text" name="phone" class="form-control mb-3" id="phone" placeholder="Write your phone number here">
                            </div>
                        </div>

                        <div class="col-md-12 mt-1">
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA   -->

        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
        <!--  END FOOTER  -->

        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
@endsection


@push('scripts')

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    @include('Admin.pages.profile.inc.custom_scripts')
    <!--  END CUSTOM SCRIPTS FILE  -->

@endpush
