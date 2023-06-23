<script>
    $(document).ready(function () {

        function checkType(type) {
            if (type === 'text') {
                input = `

        <div class="form-group  mb-4" id="text">
            <label for="text-type">{{__('lesson.text')}}</label>
            <textarea id="text-type" name="text"  rows="2"
                        placeholder="{{__('lesson.text')}}" >
                       {{isset($lesson) ?  $lesson->type == 'text' ? $lesson->body : '' : ''}}
                </textarea>
</div>
`;
                // make the text area as editor

            } else if (type === 'file') {
                input = ` <div class="form-group  mb-4" id="file">
                <label for="file">{{__('body_file')}}</label>
                   <input type="file" class="form-control" name="file">
                </div>`
            } else if (type === 'video') {
                input = ` <div class="form-group  mb-4" id="video">
                <label for=video_body>{{__('body_video')}}</label>
            <input type="file" id="video_body" class="form-control" name="video">
            </div>`
            } else {
                input = '';
            }
            return input;
        }

        $('#type').on('change', function () {
            let type = $(this).val();
            let input = '';
            input = checkType(type);
            $('#lesson_').html(input);
            if (type === 'text') {
                CKEDITOR.replace('text-type', {
                    filebrowserImageUploadUrl: `{{ route('admin.ckeditor.upload', ['_token' => csrf_token(), 'type' => 'Images']) }}`,
                    filebrowserUploadMethod: 'form',
                    filebrowserImageUploadMethod: 'form'
                });
            }
            // make the text area as editor


        });


        // check if type is selected or not to show the input field of the type
        let type = $('#type').val();
        let input = '';
        input = checkType(type);
        $('#lesson_').html(input);
        CKEDITOR.replace('text-type', {
            filebrowserImageUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token(), 'type' => 'Images']) }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageUploadMethod: 'form'
        });


    });

</script>
