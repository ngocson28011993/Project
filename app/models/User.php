<?php
/**
 * User: ThaoHa.
 * Email: havanthao93@gmail.com
 */

use Zizaco\Entrust\HasRole;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser, HasRole;

    /**
     * Table name in database
     *
     * @var string
     */
    protected $table = 'users';

    protected $guarded = array('id');

    /**
     * Validation rules for this Validator.
     *
     * @return array
     */
    public static $rules = array(
        'create' => [
            'username' => 'required|alpha_dash|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:4',
        ],
        'update' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
        ]
    );

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('Role', 'assigned_roles', 'user_id', 'role_id');
    }
}