<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaitin;

class ajaxcontroller extends Controller
{
    //
    public function getloaitin($id){
    	//lấy iD thể loại vừa chọn
    	$loaitin = loaitin::where('idTheLoai',$id)->get();
    	foreach ($loaitin as $key) {
    		# code...
    		// trả về 1 dãy các loại tin có cùng thể loại, sử dụng html và php, tách chuỗi
    		echo "<option  value='".$key->id."'>".$key->Ten."</option>";
    	}
    }
    public function gettheloai($id){
        $loaitin=loaitin::find($id);
    	$theloai= theloai::find($loaitin->idTheLoai);
    	
    		# code...
    	
    	 echo "<option  value='",$theloai->id."'>".$theloai->Ten."</option>";
   		 
	}
}
	