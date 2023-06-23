<div class="col-xxl-12 mb-4">
    <div class="switch form-switch-custom switch-inline form-switch-primary">
        <input type="checkbox" name="active" class="switch-input" id="actvation{{$exam->id}}"
            {{$exam->active == 1 ? 'checked' : ''}}>
        <label class="switch-label" for="actvation{{$exam->id}}">
            <span class="d-flex align-items-center">
                @if($exam->active == 1)
                    <span class="badge badge-success badge-pill ml-2">{{__('exams.active')}}</span>
                @else
                    <span class="badge badge-danger badge-pill ml-2">{{__('exams.inactive')}}</span>
                @endif
            </span>
        </label>
    </div>
</div>

{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
<script>
    $(document).ready(function() {
        $('#actvation{{$exam->id}}').change(function() {
            var active = $(this).is(':checked');
            var formData = {
                _token: '{{ csrf_token() }}',
                active: active ? 1 : 0
            };

            $.ajax({
                url: '{{ route('admin.exams.change_activation', $exam) }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the success response here
                    if (active) {
                        $('#actvation{{$exam->id}}').siblings('.switch-label').find('.badge')
                            .removeClass('badge-danger')
                            .addClass('badge-success')
                            .text('{{__('exams.active')}}');
                    } else {
                        $('#actvation{{$exam->id}}').siblings('.switch-label').find('.badge')
                            .removeClass('badge-success')
                            .addClass('badge-danger')
                            .text('{{__('exams.inactive')}}');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                }
            });
        });
    });
</script>

