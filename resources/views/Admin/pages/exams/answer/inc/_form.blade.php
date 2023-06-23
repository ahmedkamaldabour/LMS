<div class="row">

@csrf

{{--@foreach(\App\Models\QuestionAnswer::$translatableData as $item => $lang)--}}
{{--    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key)--}}
{{--                <div class="col-md-6 m-auto">--}}
{{--                    <label for="name_en" class="form-label">{{__('question_answer.' . $item .'_' . $key)}}</label>--}}
{{--                    <input type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key}}" value="{{old($item .'_' . $key, isset($answer) ? $answer->getTranslation($item, $key) : null)}}"--}}
{{--                           placeholder="{{__('question_answer.' . $item . '_' . $key)}}" required>--}}
{{--                    @error($item.'_'.$key)--}}
{{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--    @endforeach--}}
{{--@endforeach--}}


    <div class="col-md-6 m-auto">
        <label for="exampleFormControlInput2">Question</label>
        <select name="exam_question_id" id="" class="form-control my-2">
            <option disabled selected>Select Question</option>
            @foreach ( $questions as $question )
                <option value="{{ $question->id }}"> {{$question->question}} </option>
            @endforeach
        </select>

        @error('question_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    @php
        $types = ['0','1'];
    @endphp

    <div class="col-md-6 m-auto">
        <label for="name_en" class="form-label">Correct Or Not</label>
        <select  required class="form-control" name="correct">
            @foreach($types as $type)
                <option value="{{$type}}">{{$type}}</option>
            @endforeach
        </select>
        @if ($errors->has('correct'))
            <span class="text-danger">{{ $errors->first('correct') }}</span>
        @endif
    </div>

    <label for="answer" class="form-label">Question Answer</label>
    <div class="input-group mb-4">
        <input type="text" class="form-control my-2" name="answer" value=""
               placeholder="Write answer here .." required>
        @error('answer')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>


