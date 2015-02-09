<?php

class AdDashboardController extends BaseController {

	public function index()
	{
		return View::make('admin.dashboard');
	}

    /**
     * Login action
     *
     * @return string
     */
    public function login()
    {
        if (!Request::isMethod('post')) {
            return View::make('admin.login');

        } else {
            return 'Login failed!';
        }

    }

}
