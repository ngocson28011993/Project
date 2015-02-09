@foreach($users as $user)
    <tr class="user-item">
        <td>{{{ $user->id }}}</td>
        <td>{{{ $user->username }}}</td>
        <td>{{{ $user->email }}}</td>
        <td>
            @foreach($user->roles as $role)
                <span class="label label-info">{{{ $role->name }}}</span>
            @endforeach
        </td>
        <td>{{{ $user->confirmed }}}</td>
        <td>{{{ $user->created_at }}}</td>
        <td>
            <i class="fa fa-edit"></i> <a href="{{ URL::route('admin.adUser.edit', array('adUser' => $user->id)) }}">{{{ trans('admin_user.table.actions.edit') }}}</a>
            <i class="fa fa-trash"></i> <a href="{{ URL::route('admin.adUser.delete', array('adUser' => $user->id)) }}">{{{ trans('admin_user.table.actions.delete') }}}</a>
        </td>
    </tr>
@endforeach