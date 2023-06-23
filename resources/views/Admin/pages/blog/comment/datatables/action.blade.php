<a href="{{route('admin.comments.show', $comment)}}" class="btn btn-primary mr-2" data-toggle="tooltip"
   data-placement="top" title="{{__('actions.show')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24"
         height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2"
         stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-eye p-1 br-6 mb-1">
        <path
            d="M3 3h18v18H3z"></path>
        <circle cx="12" cy="12" r="2"></circle>
        <path
            d="M2 12s5.333-8 10-8 10 8 10 8-5.333 8-10 8-10-8-10-8z">
        </path>
    </svg>
</a>

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
