{{ Form::model($searchUserForm, array('class' => 'form-inline', 'method' => 'GET')) }}

    <div class="form-group">
        <a href="{{ URL::route('admin.adUser.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{{ trans('admin_user.table.create') }}}
        </a>
    </div>

    <div class="form-group">
        {{ Form::text('username_email', Input::old('username_email'), array('class' => 'form-control', 'placeholder' => trans('admin_user.username_e_mail'))) }}
    </div>

    <div class="form-group">
        {{ Form::select('role', $searchUserForm::getRoleSelect(), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::select('confirmed', $searchUserForm::getConfirmSelect(), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit(trans('admin_user.table.search'), array('class' => 'btn btn-default')) }}

{{ Form::close() }}