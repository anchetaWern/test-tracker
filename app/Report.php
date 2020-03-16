<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	public $table = 'report';
	
    public $timestamps = false;

    protected $fillable = ['ID', 'DeviceID', 'Location', 'DateCreated'];
}
