<?php
/**
 * User: ThaoHa
 * Email: havanthao93@gmail.com
 */

class SearchUserForm
{

    public $username_email;
    public $confirmed;
    public $role;

    /**
     * Rules for validate
     *
     * @var array
     */
    public static $rules = array(

    );

    /**
     * Get confirm array for Form::select
     *
     * @return array
     */
    public static function getConfirmSelect()
    {
        return array(
            'all'   => 'Select active',
            0       => 'Not Activated',
            1       => 'Activated',
        );
    }

    /**
     * Get role array for Form::select
     *
     * @return array
     */
    public static function getRoleSelect()
    {
        $result = array('all' => 'Select role');
        $roles = Role::all();

        foreach ($roles as $role) {
            $result[$role['id']] = $role['name'];
        }

        return $result;
    }

    /**
     * Search user
     *
     * @param Array $input
     */
    public function search($input = array())
    {
        $this->username_email   = array_get($input, 'username_email', null);
        $this->confirmed        = array_get($input, 'confirmed', 'all');
        $this->role             = array_get($input, 'role', 'all');

        $users = User::with('roles');

        if ($this->username_email) {
            $users->where(function ($query) {
                $query->where('username', 'LIKE', '%' . $this->username_email . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->username_email . '%');
            });
        }

        if ($this->confirmed != 'all') {
            $users->where(function($query) {
                $query->where('confirmed', $this->confirmed);
            });
        }

        if ($this->role != 'all') {
            $users->whereHas('roles', function($query) {
                if (is_array($this->role)) {
                    $query->whereIn('role_id', $this->role);
                } else {
                    $query->where('role_id', $this->role);
                }
            });
        }

        return $users;
    }
} 