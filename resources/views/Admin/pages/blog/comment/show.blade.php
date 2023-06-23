@extends('Admin.inc.master')

@section('title', 'comment details')


@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-3 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('comment.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.comments.index') }}">{{ __('comment.comment') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('comment.show') }}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->
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
                                            <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Full Width</li>
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
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="card bg-primary">
                            <div class="card-body pt-3">
                                <h5 class="card-title mb-3"> <b>{{__('comment.post_title')}} : </b> {{$post->title}}</h5>
                                <p class="card-text"><b>{{__('comment.category')}} : </b> {{$post->category->name}}</p>
                                @if($post->image)
                                    <img src="{{asset('storage/'.$post->image)}}" alt="post image" width="100px" height="100px">
                                @endif
                            </div>


                            <div class="card-body pt-3">
                                <h5 class="card-title mb-3">  <b> {{__('comment.post_body')}} :  </b> {{$post->body}}</h5>
                                <p class="card-text"><b>{{__('comment.created_at')}} :</b> {{$post->created_at}}</p>
                                <p class="card-text"> <b>{{__('comment.likes')}} : </b> {{$post->like}}</p>
                                <p class="card-text"> <b>{{__('comment.views')}} : </b> {{$post->view_count}}</p>
                            </div>


                            <div class="card-body pt-3">
                                    <h5 class="card-title mb-3"> <b>{{__('comment.comment_body')}} : </b> {{$comment->body}}</h5>
                                    <p class="card-text"><b>{{__('comment.status')}} : </b>
                                        {{$comment->Status ? __('comment.approved') : __('comment.rejected')}}</p>
                                    <p class="card-text"><b>{{__('comment.created_at')}} : </b> {{$comment->created_at}}</p>
                            </div>
                            <div class="card-body pt-3">
                                <div class="card-body pt-3">
                                    <form id="delete" action="{{ route('admin.comments.change_status', $comment) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('put')
                                        @if($comment->status == false)
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();return false;" class="btn btn-success mr-2"
                                               data-toggle="tooltip"
                                               data-placement="top" title="{{__('actions.change_status_to_approve')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-check-circle p-1 br-6 mb-1">
                                                    <path
                                                        d="M22 11.08V12a10 10 0 1 1-5.93-9.14">
                                                    </path>
                                                    <polyline
                                                        points="22 4 12 14.01 9 11.01">
                                                    </polyline>
                                                </svg>
                                            </a>
                                        @else
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();return false;" class="btn btn-danger mr-2"
                                               data-toggle="tooltip"
                                               data-placement="top" title="{{__('actions.change_status_to_reject')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-x-circle p-1 br-6 mb-1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg>
                                            </a>
                                        @endif
                                    </form>
                                    <form id="delete" action="{{ route('admin.comments.destroy', $comment) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0);" onclick="this.closest('form').submit();return false;"
                                           class="btn btn-danger mr-2" data-toggle="tooltip"
                                           data-placement="top" title="{{__('actions.delete')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </form>


                                </div>
                                <div class="card bg-light-dark">
                                </div>
                                <div class="card bg-light-dark">
                                </div>
                            </div>



                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection


