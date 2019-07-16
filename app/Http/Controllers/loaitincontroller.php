<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\theloai;

class loaitincontroller extends Controller
{
    //
    
    public function getdanhsach(){
        $loaitin= loaitin::all();
    	return view('giaodienadmin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
//sửa
      public function getsua($id){
             $loaitin = loaitin::find($id);
             $theloai=theloai::all();
    	return view('giaodienadmin.loaitin.sua',['loaitin'=>$loaitin],['theloai'=>$theloai]);
    }
    public function postsua(Request $request,$id){
         $loaitin = loaitin::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|unique:loaitin,Ten|min:3|max:50'
            ],
            [
                'Ten.required' =>'bạn chưa nhập tên',
                'Ten.unique'=>'tên đã bị trùng',
                'Ten.min'=>'tên giới hạn 3 đến 50 kí tư',
                 'Ten.max'=>'tên giới hạn 3 đến 50 kí tư',
            ]);
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->theloai;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','bạn đã sửa thành công');
    }
    //thêm
      public function getthem(){
        $theloai = theloai::all();
    	return view('giaodienadmin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postthem(Request $request){
            $loaitin= new loaitin;
         $this->validate($request,
            [
                'Ten'=>'required|unique:loaitin,Ten|min:3|max:50',
                'theloai'=>'required'
            ],
            [
                'Ten.required' =>'bạn chưa nhập tên',
                'Ten.unique'=>'tên đã bị trùng',
                'Ten.min'=>'tên giới hạn 3 đến 50 kí tư',
                 'Ten.max'=>'tên giới hạn 3 đến 50 kí tư',
                 'theloai.required'=>'bạn chưa chọn thể loại',
            ]);
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->theloai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','bạn đã thêm thành công');
    }
    public function getxoa($id){
        $loaitin=loaitin::find($id);
        foreach ($loaitin->tintuc as $key ) {
            # code...
            foreach ($key->comment as $cm) {
                # code...
                $cm->delete();
            }
            $key->delete();
        }
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','bạn đã xóa thành công');
    }
}
