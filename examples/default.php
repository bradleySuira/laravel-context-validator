<?php
/**
* 
* @return \Illuminate\Http\Redirect\RedirectResponse
*/
public function postCreate()
{
	$v = EquipmentTypeValidator::make()->on('create');

	if(!$v->passes()){
		return \Redirect::action('App\Controllers\YourController@getCreate')->withInput()->withErrors($v->errors());
	}

	//custom login for insert or create a new record
	//.....
}