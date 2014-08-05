<?php

class Itemsuser extends Eloquent  
{

	protected $table = 'itemsusers';

	public  $timestamps = true;

	public function user()
    {
        return $this->belongsTo('User');
    }	

}