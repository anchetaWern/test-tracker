<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;

class Device extends Model
{
	public $table = 'device';

    public $timestamps = false;

    protected $fillable = ['ID', 'Name'];

    public function reports() {
    	return $this->hasMany(Report::class, 'Device_ID', 'ID');
    }
}
