<div class="demo-inline-spacing justify-content-around ">

    <!-- view user btn -->

    <!-- <a type="button" class="btn btn-sm btn-warning action-row" title="{{trans('general.view')}}" style="margin: 0px;" id="view_{{ $id }}" href="route('admin.UserAccountDetails',$id) }}">
        <i class="far fa-eye "></i>
    </a> -->


    <!-- Edit user btn -->

    <a type="button" class="btn btn-sm btn-info action-row" title="{{trans('general.edit')}}" style="margin: 0px;" id="edit_{{ $id }}" href="{{route('admin.semesters.update',$id) }}">
        <i class="far fa-edit "></i>
        <!-- <i data-feather='edit'></i> -->
    </a>


    <button type="button" onclick="confirm(`{{trans('general.delete_record_confirmation')}}`) ? document.getElementById('delete-semester-{{ $id }}').submit() : false;" class="btn btn-sm btn-danger action-row" title="{{trans('general.delete')}}" style="margin: 0px;" id="close_{{ $id }}">
        <i class="far fa-trash-alt "></i>
    </button>

    <!-- close account btn -->
</div>
<form semester="form" id="delete-semester-{{ $id }}" action="{{ route('admin.semesters.delete', $id) }}" method="POST">
    @csrf
    <input type="hidden" name="semester_id" value="{{ $id }}">
</form>