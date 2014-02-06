<?php namespace App\Services\Validators;
 
class UserValidator extends ContextValidator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'create'          => array('first_name' => 'required',
                               'last_name' => 'required',
                  					   'email' => 'required|email|unique:users,email',
                               'job_title' => 'required',
                               'group_id' => 'required|exists:groups,id',
                  					   'password' => array('required','Confirmed', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/'),
                               ),

    'update'          => array('first_name' => 'required',
                               'last_name' => 'required',
                               'email' => 'required|email',
                               'job_title' => 'required',
                               'group_id' => 'required|exists:groups,id',
                               ),

    'login'           => array('email'   =>'required|email',
                                'password' => array('required'),
                                ),

    'forgot_password' => array('email'   =>'required|email'),

    'reset_password'  => array('email'=>'required|email',
                               'reset_code'=>'required',
                               'password' => array('required', 'Confirmed' ,'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/'),
                               'password_confirmation' => 'required'),

    'change_password' => array('current_password'=>'required|different:password',
                               'password' => array('required', 'Confirmed' ,'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/'),
                               'password_confirmation' => 'required',),
     'modify_password' => array('password' => array('required', 'Confirmed' ,'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/'),
                               'password_confirmation' => 'required',),
    );
 
}