@foreach ($errors->all() as $error)
    <li style="color: red">{{ $error }}</li>
@endforeach


@foreach(\App\Models\Lesson::$translatableData as $item => $lang)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key)
        @if($lang['type'] == 'text')
            <div class="form-group mb-4">
                <label for="title">{{__('lesson.' . $item .'_' . $key)}}</label>
                <input type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key}}"
                       value="{{old($item .'_' . $key, isset($lesson) ? $lesson->getTranslation($item, $key) : null)}}"
                       id="title" placeholder="{{__('lesson.' . $item . '_' . $key)}}" required>
            </div>

            @error($item.'_'.$key)
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        @endif
        @if($lang['type'] === 'textarea' )
            <div class="text  form-group   mb-4" style="display: none">
                <label for="text-type">{{__('lesson.' . $item .'_' . $key)}}</label>
                <textarea id="text-type" name="{{$item}}_{{$key}}" rows="2" class="ck-editor__editable "
                          placeholder="{{__('lesson.' . $item .'_' . $key)}}">
                       {{old($item .'_' . $key, isset($lesson) ?$lesson->getTranslation('body', $key) : null)}}
                        </textarea>
            </div>
            @error($item.'_'.$key)
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        @endif

    @endforeach
@endforeach

<div class="form-group  mb-4" style="display: none" id="file">
    <label for="file">{{__('lesson.body_file')}}</label>
    <input type="file" class="form-control" name="file">
</div>

<div class="form-group  mb-4" style="display: none" id="video">
    <label for=video_body>{{__('lesson.body_video')}}</label>
    <input type="file" class="form-control" name="video">
</div>
{{--    type         --}}
<div class="form-group mb-4">
    <label for="type">
        {{__('lesson.type')}}
    </label>
    <select id="type" name="type" class="form-control">
        <option value="">Default select</option>
        <option
            value="video" @selected(old('type', (isset($lesson) ? $lesson->type : '')) == 'video')>{{ __('lesson.video') }}</option>
        <option
            value="file" @selected(old('type', (isset($lesson) ? $lesson->type : '')) == 'file')>{{ __('lesson.file') }}</option>
        <option
            value="text" @selected(old('type', (isset($lesson) ? $lesson->type : '')) == 'text')>{{ __('lesson.text') }}</option>
    </select>

</div>
{{--   categories --}}
<div class="form-group mb-4">
    <label for="course">
        {{__('lesson.course')}}
    </label>
    <select id="course" name="course_id" class="form-control">
        <option>Default select</option>
        @foreach($courses as $course)
            <option value="{{$course->id}}"
                @selected(old('course_id', (isset($lesson) ? $lesson->course_id : '')) == $course->id)
            >  {{$course->title}}</option>
        @endforeach
    </select>

</div>
{{--   End categories --}}

<div class="form-group mb-4">
    <label for="time">{{__('lesson.time')}}</label>
    <input type="text" class="form-control" name="time"
           value="{{ old('time', isset($lesson) ? $lesson->time : '') }}"
           id="time" placeholder="Time">
</div>

<div class="form-group mb-4" id="lesson_">

</div>


@push('js')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            let type = $('#type');
            let counter = 0;
            type.change(function () {


                let type_value = $(this).val();
                checkType(type_value);
                if (type_value === 'text') {
                    if (counter === 0) {
                        ckeditor_handle();
                        counter++;
                    }


                }
            });

            let type_val = type.val();
            checkType(type_val);

            if (type_val === 'text') {
                ckeditor_handle();
            }
        });


        function ckeditor_handle() {
            let textType = document.getElementsByClassName('ck-editor__editable');
            for (let i = 0; i < textType.length; i++) {
                CKEDITOR.replace(textType[i], {
                    filebrowserImageUploadUrl: `{{ route('admin.ckeditor.upload', ['_token' => csrf_token(), 'type' => 'Images']) }}`,
                    filebrowserUploadMethod: 'form',
                    filebrowserImageUploadMethod: 'form'
                });
            }
        }

        function checkType(type) {
            if (type === 'text') {
                $('.text').show();
                $('#file').hide();
                $('#video').hide();
            } else if (type === 'file') {
                $('.text').hide();
                $('#file').show();
                $('#video').hide();
            } else if (type === 'video') {
                //hide all div has class text
                $('.text').hide();
                $('#file').hide();
                $('#video').show();
            } else {
                $('.text').hide();
                $('#file').hide();
                $('#video').hide();
            }
        }
    </script>
@endpush


