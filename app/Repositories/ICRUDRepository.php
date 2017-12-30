<?php 

namespace App\Repositories;

interface ICRUDRepository
{
	/**
	*	get all records
	*
	*/
	public function all();
	/**
	*	get record by id
	*
	*/
	public function get($id);
	/**
	*	insert new record
	*
	*/	
	public function insert(array $model);
	/**
	*	update existing record
	*
	*/
	public function update($id, array $model);
	/**
	*	delete record
	*
	*/
	public function delete($id);
}
