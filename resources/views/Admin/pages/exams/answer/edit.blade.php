@extends('Admin.inc.master')
@section('title')
   Edit Question Answer
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!--  BEGIN BREADCRUMBS  -->
                <div class="breadcrumb-wrapper-content  mb-5 mt-3 d-flex justify-content-start bg-light">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('question_answer.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.question_answer.index') }}">{{ __('question_answer.all') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('question_answer.edit') }}</li>
                        </ol>
                    </nav>
                </div>
                <!--  END BREADCRUMBS  -->


                <div class="statbox widget box box-shadow mt-lg-5">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center"> {{__('question_answer.edit')}} </h4>
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

                            <form action="{{route('admin.question_answer.update',$answer)}}" method="post">
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        @csrf
{{--                                        <div class="col-md-6 m-auto">--}}
{{--                                            <label for="exampleFormControlInput2">Question</label>--}}
{{--                                            <select name="exam_question_id"  id="" class="form-control my-2">--}}
{{--                                                <option>Select Question</option>--}}
{{--                                                    @foreach ( $questions as $question )--}}
{{--                                                        <option value="{{ $question->id }}" @selected(old('exam_question_id', $answer->exam_question_id) == $question->id)> {{$question->id}} </option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}

{{--                                            @error('exam_question_id')--}}
{{--                                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}


                                        <div class="col-md-12 m-auto mb-3">
                                            <label for="name_en" class="form-label">Correct Or Not</label>
                                            <div>
                                                <input type="checkbox" name="correct" id="correct" value="1" {{ $answer->correct || old('correct') == 1 ? 'checked' : '' }}/>
                                            @if ($errors->has('correct'))
                                                    <span class="text-danger">{{ $errors->first('correct') }}</span>
                                                @endif
                                            </div>

                                        </div>


                                        <label for="answer" class="form-label">Question Answer</label>
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control my-2" name="answer" value="{{$answer->answer}}"
                                                   placeholder="Write answer here .." required>
                                            @error('answer')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-success"> {{__('question_answer.update_answer')}} </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
