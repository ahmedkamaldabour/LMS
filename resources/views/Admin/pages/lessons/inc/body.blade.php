@if($lesson->type == 'text')

    {!!
                // show only 5 words and if body contain image show image only  and skip text after image
             Str::words($lesson->getTranslation('body', LaravelLocalization::getCurrentLocale()), 5, ' ...') .
             (strpos($lesson->getTranslation('body', LaravelLocalization::getCurrentLocale()), '<img') !== false ?
                Str::after($lesson->getTranslation('body', LaravelLocalization::getCurrentLocale()), '<img') : '')
    !!}

@elseif($lesson->type == 'video')
    <video width="320" height="240" controls>
        <source src="{{asset(\App\Models\Lesson::PATH .'/'.  $lesson->body)}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

@elseif($lesson->type == 'file')
    <a  class="btn-primary btn" href="{{asset(\App\Models\Lesson::PATH .'/'.  $lesson->body)}}" download>Download</a>

@endif
