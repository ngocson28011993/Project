<?php

class AdRolesController extends BaseController {

    /**
     * Display a listing of roles
     *
     * @return Response
     */
	public function index()
	{
        $limit = Input::get('limit', 15);
        $roles = Role::simplePaginate($limit);

		return View::make('admin.role.index', array(
            'roles' => $roles,
        ));
	}

    /**
     * Show the form for creating a new role
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.role.form');
    }

    /**
     * Store a newly created role in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Role::rules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Role::create($data);
        return Redirect::action('AdRolesController@index');
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return View::make('admin.role.form', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Role::rules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $role->update($data);
        return Redirect::action('AdRolesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if (Request::isMethod('GET')) {
            return View::make('admin.role.delete', compact('role'));

        } else {
            $role->delete();
            return Redirect::action('AdRolesController@index');
        }
    }
}
