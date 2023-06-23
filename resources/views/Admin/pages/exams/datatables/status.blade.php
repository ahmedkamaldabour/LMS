<div class="col-xxl-12 mb-4">
    <div class="switch form-switch-custom switch-inline form-switch-primary">

        <input type="checkbox" name="active" class="switch-input" id="status{{$exam->id}}" {{$exam->close == 0 ? '' : 'checked'}}>
        <label class="switch-label" for="status{{$exam->id}}">
            <span class="d-flex align-items-center">
                @if($exam->close == 0)
                    <span class="badge badge-danger badge-pill ml-2">{{__('exams.close')}}</span>
                @else
                    <span class="badge badge-success badge-pill ml-2">{{__('exams.open')}}</span>
                @endif
            </span>
        </label>
    </div>

</div>
<script>
    $(document).ready(function (){
        $('#status{{$exam->id}}').change(function (){
            var status = $(this).is(':checked');
            var formData = {
                _token: '{{ csrf_token() }}',
                status: status ? 1 : 0
            };

            $.ajax({
                url: '{{ route('admin.exams.change_status', $exam) }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the success response here
                    if (status) {
                        $('#status{{$exam->id}}').siblings('.switch-label').find('.badge')
                            .removeClass('badge-danger')
                            .addClass('badge-success')
                            .text('{{__('exams.open')}}');
                    } else {
                        $('#status{{$exam->id}}').siblings('.switch-label').find('.badge')
                            .removeClass('badge-success')
                            .addClass('badge-danger')
                            .text('{{__('exams.close')}}');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                }
            })

        });
    });
</script>







