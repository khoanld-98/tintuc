<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaitin;
use App\tintuc;
//thêm 1 function ngoài vào laravel coppy file vào app
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload
class theloaicontroller extends Controller
{
    //
  
     public function getdanhsach(){
      $theloai=theloai::all();
    	return view('giaodienadmin.theloai.danhsach',['theloai'=>$theloai]);
    }
    // sửa thể loại
      public function getsua($id){
        $theloai=theloai::find($id);
     
    	return view('giaodienadmin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postsua(Request $request,$id){
        $theloai =theloai::find($id);
        //kiểm tra đầu vào
        $this->validate($request,
        [
          'Ten'=>'required|unique:theloai,ten|min:3|max:50'
        ],
        [
          'Ten.required'=>'bạn chưa nhập tên thể loại mà bạn muốn sửa',
          'Ten.unique'=>'tên đã bị trùng',
          'Ten.min'=>'tên phải thuộc 3 đến 50 kí tự',
          'Ten.max'=>'tên phải thuộc 3 đến 50 kí tự',
        ]);
        $theloai->Ten= $request->Ten;
        $theloai->TenKhongDau= changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa thành công');

    }

    //thêm thể loại
      public function getthem(){

    	return view('giaodienadmin.theloai.them');
    }
    public function postthem(Request $request){

      $this->validate($request,
      [ // các sự cố có thể xảy ra\
        'ten'=>'required|min:3|max:50|unique:theloai,ten'
      ],
      [
        'ten.required'=>'bạn chưa khai báo tên',
        'ten.min'=>'tên phải thuộc 3 đến 50 kí tự',
        'ten.max'=>'tên phải thuộc 3 đến 50 kí tự',
        'ten.unique'=>'tên đã bị trùng',
      ]);
      $themtheloai= new theloai;
      $themtheloai->Ten=$request->ten;
      $themtheloai->TenKhongDau=changeTitle($request->ten);
      $themtheloai->save();
      return redirect('admin/theloai/them')->with('thongbao','thêm thành công');//tạo session flash
    }

    //xóa thể loại
    public function getxoa($id){
      $theloai= theloai::find($id);
      //xóa tin tức
      foreach ($theloai->tintuc as $key ) {
        # code...
       foreach ($key->comment as $cm) {
         # code...
           $cm->delete();
         }
            $key->delete();
      }
      foreach ($theloai->loaitin as $key ) {
        # code...
        $key->delete();
      }
      $theloai->delete();
      return redirect('admin/theloai/danhsach')->with('thongbao','đã xóa thành công');
    }
 
}
