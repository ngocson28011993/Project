<?php
/**
 * User: ThaoHa
 * Email: havanthao93@gmail.com
 */

return array(

    'username' => 'Username',
    'password' => 'Password',
    'password_confirmation' => 'Confirm Password',
    'e_mail' => 'Email',
    'username_e_mail' => 'Username or Email',
    'role' => 'Roles',

    'create' => array(
        'title' => 'Create',
        'desc' => 'Create new account',
        'confirmation_required' => 'Confirmation required',
        'submit' => 'Create new account',
        'clear' => 'Clear',
    ),

    'edit' => array(
        'title' => 'Edit',
        'desc' => 'Edit account',
        'submit' => 'Save account',
    ),

    'delete' => array(
        'cancel' => 'Cancel',
        'submit' => 'Delete',
    ),

    'login' => array(
        'title' => 'Login',
        'desc' => 'Enter your credentials',
        'forgot_password' => '(forgot password)',
        'remember' => 'Remember me',
        'submit' => 'Login',
    ),

    'table' => array(
        'create' => 'Create new',
        'search' => 'Search',
        'username' => 'Username',
        'e_mail' => 'Email',
        'roles' => 'Roles',
        'active' => 'Active',
        'created_at' => 'Created at',
        'actions' => array(
            'title' => 'Actions',
            'edit' => 'Edit',
            'delete' => 'Delete',
        )
    ),

    'alerts' => array(
        'account_created' => 'Your account has been successfully created.',
        'account_updated' => 'Your account has been successfully updated.',
        'instructions_sent' => 'Please check your email for the instructions on how to confirm your account.',
        'too_many_attempts' => 'Too many attempts. Try again in few minutes.',
        'wrong_credentials' => 'Incorrect username, email or password.',
        'not_confirmed' => 'Your account may not be confirmed. Check your email for the confirmation link',
        'confirmation' => 'Your account has been confirmed! You may now login.',
        'password_confirmation' => 'The passwords did not match.',
        'wrong_confirmation' => 'Wrong confirmation code.',
        'password_forgot' => 'The information regarding password reset was sent to your email.',
        'wrong_password_forgot' => 'User not found.',
        'password_reset' => 'Your password has been changed successfully.',
        'wrong_password_reset' => 'Invalid password. Try again',
        'wrong_token' => 'The password reset token is not valid.',
        'duplicated_credentials' => 'The credentials provided have already been used. Try with different credentials.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Account Confirmation',
            'greetings' => 'Hello :name',
            'body' => 'Please access the link below to confirm your account.',
            'farewell' => 'Regards',
        ),

        'password_reset' => array(
            'subject' => 'Password Reset',
            'greetings' => 'Hello :name',
            'body' => 'Access the following link to change your password',
            'farewell' => 'Regards',
        ),
    ),

);
