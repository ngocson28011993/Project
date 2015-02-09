<?php

class AdUsersController extends BaseController {

    /**
     * Display a listing of users
     *
     * @return Response
     */
	public function index()
	{
        $searchUserForm = new SearchUserForm();
        $limit = Input::get('limit', 15);

        $users = $searchUserForm->search(Input::all());
        $users = $users->simplePaginate($limit);

		return View::make('admin.user.index', array(
            'users' => $users,
            'searchUserForm' => $searchUserForm,
        ));
	}

    /**
     * Create user
     *
     * @return mixed
     */
    public function create()
    {
        $roles = array();
        foreach (Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }

        return View::make('admin.user.form', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::except('roles'), User::$rules['create']);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::create($data);
        $user->roles()->sync(Input::get('roles'));

        // Send mail after create new user
        if (false) {
            Mail::queueOn(
                Config::get('confide::email_queue'),
                Config::get('confide::email_account_confirmation'),
                compact('user'),
                function ($message) use ($user) {
                    $message
                        ->to($user->email, $user->username)
                        ->subject(trans('admin_user.email.account_confirmation.subject'));
                }
            );
        }

        return Redirect::action('AdUsersController@index');
    }

    /**
     * Edit user
     *
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = array();

        foreach ($user->roles as $role) {
            $roles[] = $role->id;
        }
        $user->roles = $roles;

        $roles = array();
        foreach (Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }

        return View::make('admin.user.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($data = Input::except('roles'), User::$rules['update']);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['confirmed'] = Input::get('confirmed') ? 1 : 0;
        $user->update($data);
        $user->roles()->sync(Input::get('roles'));

        return Redirect::action('AdUsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (Request::isMethod('GET')) {

            return View::make('admin.user.delete', array(
                'user' => $user,
            ));

        } else {
            $user->delete();
            return Redirect::action('AdUsersController@index');
        }
    }

    /**
     * @return mixed
     */
    public function login()
    {
        return View::make('admin.user.login');
    }

    /**
     * Login action
     *
     * @return string
     */
    public function doLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($repo->login($input, true)) {
            return Redirect::action('AdDashboardController@index');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = trans('user.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = trans('user.alerts.not_confirmed');
            } else {
                $err_msg = trans('user.alerts.wrong_credentials');
            }

            return Redirect::action('AdUsersController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Logout
     *
     * @return mixed
     */
    public function logout()
    {
        Confide::logout();
        return Redirect::action('AdUsersController@login');
    }

}
