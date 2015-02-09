<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        // create roles
        $memberRole = new Role;
        $memberRole->name = 'Member';
        $memberRole->save();

        $adminRole = new Role;
        $adminRole->name = 'Admin';
        $adminRole->save();

        // create admin user
		$user = new User();
        $user->username = 'admin';
        $user->email = 'admin@site.com';
        $user->password = '123457';
        $user->password_confirmation = '123457';
        $user->confirmed = 1;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if (!$user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            // set role
            $user->attachRole($adminRole);

            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }
	}

}
