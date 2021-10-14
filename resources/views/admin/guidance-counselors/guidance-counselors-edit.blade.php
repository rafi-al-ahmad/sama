@extends('admin.index')
@section('content')

@if($guidanceCounselor->settings)
<?php
$guidanceCounselorSettings = json_decode($guidanceCounselor->settings, true);
?>
@else
<?php
$guidanceCounselorSettings = json_decode('{}', true);
?>
@endif
<div class="card">
    <div class="border-bottom card-header">
        <h4 class="card-title">{{ trans('general.guidanceCounselors_edit') }}</h4>
    </div>

    <form action="{{ route('admin.guidanceCounselors.update', $guidanceCounselor->id) }}" method="post">
        <input type="hidden" name="id" value="{{$guidanceCounselor->id}}">
        @csrf
        <div class="card-body">
            <div class="row pt-2">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="fname">{{ trans('general.First Name') }}</label>
                        <input required type="text" name="firstName" class="form-control" id="fname" placeholder="Nour" value="{{old('firstName')? old('firstName') : $guidanceCounselor->first_name}}">
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="lname">{{ trans('general.Last Name') }}</label>
                        <input required type="text" name="lastName" class="form-control" id="lname" placeholder="Yaseen" value="{{old('lastName')? old('lastName') : $guidanceCounselor->last_name}}">
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="phone">{{ trans('general.phone') }}</label>
                        <input required type="text" name="phone" class="form-control" id="phone" value="{{old('phone')? old('phone') :  $guidanceCounselor->phone}}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="stageSelect">{{ trans('general.stage') }}</label>
                        <select required name="stage_id" class="form-select" id="stageSelect">
                            <option value="">--</option>
                            @foreach($stages as $stage)
                            <option value="{{ $stage->id }}" {{ old('stage')? ($stage->id == old('stage')? 'selected':'') : ($stage->id == $guidanceCounselor->stage_id? 'selected':'') }}>{{ $stage->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="email">{{ trans('general.Email') }}</label>
                        <input disabled required type="text" name="email" class="form-control" id="email" placeholder="nob@gmail.com" value="{{old('email')? old('email') : $guidanceCounselor->email}}">
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-6 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="username">{{ trans('general.Username') }}</label>
                        <input disabled required type="text" name="username" class="form-control" id="username" placeholder="no_shd" value="{{old('username')? old('username') : $guidanceCounselor->username}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{ trans('general.save') }}</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">{{ trans('general.reset') }}</button>
        </div>
    </form>
</div>


<div class="card">
    <div class="border-bottom card-header">
        <h4 class="card-title">{{ trans('general.Change Password') }}</h4>
    </div>

    <form action="{{ route('admin.guidanceCounselors.update.password', $guidanceCounselor->id) }}" method="post">
        <input type="hidden" name="id" value="{{$guidanceCounselor->id}}">
        @csrf
        <div class="card-body">
            <div class="row pt-2">
                <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="password">{{ trans('general.New Password') }}</label>
                        <input required type="text" name="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="confirm-password">{{ trans('general.Confirm your new password') }}</label>
                        <input required type="text" name="password_confirmation" class="form-control" id="confirm-password">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{ trans('general.save') }}</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">{{ trans('general.reset') }}</button>
        </div>
    </form>
</div>


<div class="card">
    <div class="border-bottom card-header">
        <h4 class="card-title">{{ trans('general.Account Status') }}</h4>
        @if(!empty($guidanceCounselorSettings))
        @if($guidanceCounselorSettings['status'] == 1)
        <button type="" disabled class="btn btn-success deactivate-account">{{ trans("general.Activated Account") }}</button>
        @else
        <button type="" disabled class="btn btn-danger deactivate-account">{{ trans("general.Deactivated Account") }}</button>
        @endif
        @else
        <button type="" disabled class="btn btn-success deactivate-account">{{ trans("general.Activated Account") }}</button>
        @endif
    </div>

    <form action="{{ route('admin.guidanceCounselors.update.status', $guidanceCounselor->id) }}" onsubmit="if(confirm(`{{ trans('general.Confirm Change Account Status') }}`)){return true;} return false;" method="post">
        <input type="hidden" name="id" value="{{$guidanceCounselor->id}}">
        @csrf
        <div class="card-body">
            <div class="row ">
                <div class=" col-12">
                    <div class="mb-1 d-grid">
                        @if(!empty($guidanceCounselorSettings))
                        @if($guidanceCounselorSettings['status'] == 0)
                        <input required type="hidden" name="status" class="form-control" value="1" id="status">
                        <button type="submit" class="btn btn-success deactivate-account">{{ trans("general.Activate Account") }}</button>
                        @else
                        <input required type="hidden" name="status" class="form-control" value="0" id="status">
                        <button type="submit" class="btn btn-danger deactivate-account">{{ trans("general.Deactivate Account") }}</button>
                        @endif
                        @else
                        <input required type="hidden" name="status" class="form-control" value="0" id="status">
                        <button type="submit" class="btn btn-danger deactivate-account">{{ trans("general.Deactivate Account") }}</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </form>
</div>


@push('scripts')



@endpush

@push('header')


@endpush
@endsection