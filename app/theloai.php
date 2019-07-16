<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    //
     protected $table='theloai';
     public function loaitin(){
     	return $this->hasmany('App\loaitin','idTheLoai','id');
     }
      public function tintuc()
     {
     	# code...
     	return $this->hasManyThrough('App\tintuc','App\loaitin','idTheloai','idLoaiTin','id');

     }
}
