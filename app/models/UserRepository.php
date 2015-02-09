<?php



/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     * @param $id
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
        $id = array_get($input, 'id', null);
        if ($id) {
            $user = User::find($id);
        } else {
            $user = new User;
        }

        $user->username  = array_get($input, 'username');
        $user->email     = array_get($input, 'email');
        $user->password  = array_get($input, 'password');
        $user->confirmed = array_get($input, 'confirmed', 0);

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = array_get($input, 'password_confirmation');

        if (!$id) {
            // Generate a random confirmation code
            $user->confirmation_code     = md5(uniqid(mt_rand(), true));
        } else {
            $user->touch();
        }

        // Get role
        $role = array_get($input, 'role', null);

        // Save if valid. Password field will be hashed before save
        $error = !$this->save($user, $role);

        return array(
            'user' => $user,
            'error' => $error,
        );
    }

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     * @param $confirmed_only
     * @return  boolean Success?
     */
    public function login($input, $confirmed_only = null)
    {
        if (! isset($input['password'])) {
            $input['password'] = null;
        }
        $confirmed_only = $confirmed_only === null ? Config::get('confide::signup_confirm') : $confirmed_only;
        return Confide::logAttempt($input, $confirmed_only);
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (! $user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user   = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password              = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     * @param  boolean $role
     * @return  boolean Success
     */
    public function save(User $instance, $role = null)
    {
        if ($instance->save()) {
            $this->saveRoles($instance, $role);
            return true;
        }
        return false;
    }

    /**
     * Save roles inputted from multiselect
     *
     * @param  User $instance
     * @param $roles
     */
    public function saveRoles(User $instance, $roles)
    {
        if (!empty($roles)) {
            $instance->roles()->sync($roles);
        } else {
            $instance->roles()->detach();
        }
    }
}
