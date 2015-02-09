<?php
/**
 * User: ThaoHa
 * Email: havanthao93@gmail.com
 */

use Zizaco\Confide\UserValidator as ConfideUserValidator;

class UserValidator extends ConfideUserValidator
{

    /**
     * Override validator of confide
     * Use rules in User model
     *
     * @var array
     */
    public $rules = array('create' => array(), 'update' => array());

} 