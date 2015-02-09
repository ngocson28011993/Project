<?php
/**
 * User: ThaoHa
 * Email: havanthao93@gmail.com
 */

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';

    protected $fillable = array('name');

    /**
     * Rules for validate
     *
     * @return array
     */
    public static function rules()
    {
        return array(
            'name' => 'required|max:32|min:4|unique:roles'
        );
    }

    /**
     * Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('User', 'assigned_roles', 'user_id', 'role_id');
    }
}