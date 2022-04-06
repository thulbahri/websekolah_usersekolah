<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_tes extends Model
{
	use HasFactory;
	protected $table = "data_tes"; 

	public function data_tes_belongsto(){
		return $this->belongsTo(Data_tes_belongsto::class);
	}

	public function data_tes_hasmany(){
		return $this->hasMany(Data_tes_hasmany::class);
	}

	public function data_tes_hasone(){
		return $this->hasOne(Data_tes_hasone::class);
	}

}
