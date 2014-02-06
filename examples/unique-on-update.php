<?php


use App\Services\Validators\EquipmentTypeValidator;

/**
* 
* @return \Illuminate\Http\Redirect\RedirectResponse
*/
public function postEdit($id = null)
{
	//set the current id for ignore the current record on validation
	//you can check first if the record with param id exist
	$v = EquipmentTypeValidator::make()->on('update')->setCurrent($id); 

	if(!$v->passes()){
		return \Redirect::action('App\Controllers\YourController@getEdit')->withInput()->withErrors($v->errors());
	}

	//custom login for insert or create a new record
	//.....
}