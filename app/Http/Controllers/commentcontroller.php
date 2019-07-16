<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\loaitin;
use App\tintuc;
use Illuminate\Support\Facades\Auth;
use App\theloai;
class commentcontroller extends Controller
{
    //
    public function xoacomment($id){
    	$comment =comment::find($id);
    	$comment->delete();
    	return redirect('admin/tintuc/sua/'.$comment->tintuc->id)->with('thongbao','bạn đã xóa thành công');
    }
    public function postcomment(Request $request ,$id){
    	$tintuc =tintuc::find($id);
    	$comment= new comment;
    	$comment->idTinTuc=$id;
    	$comment->idUser=Auth::user()->id;
    	$comment->NoiDung=$request->noidung;
    	$comment->save();
    	return redirect('tintuc/'.$id.'/'.$tintuc->TieuDeKhongDau.".html")->with('thongbao','bạn đã thêm bình luận thành công');
    }
}
