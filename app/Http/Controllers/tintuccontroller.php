<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
use App\theloai;
use App\comment;
class tintuccontroller extends Controller
{
    //
  
     public function getdanhsach(){
        $tintuc=tintuc::all();

    	return view('giaodienadmin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getxoa($id){
      $tintuc=tintuc::find($id);
      foreach ($tintuc->comment as $key ) {
        # code...
        $key->delete();
      }
      $tintuc->delete();
      return redirect('admin/tintuc/danhsach')->with('thongbao','xóa thành công');
    }
//////////////////////////////////////////////
      public function getsua($id){
        $loaitin =loaitin::all();
        $theloai= theloai::all();
        $tintuc= tintuc::find($id);
        // tìm kiếm tất cả các bài đăng có id = id của tin tức
    	return view('giaodienadmin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postsua(Request $request,$id){
        $tintuc=tintuc::find($id);
         $this->validate($request,
      [
        // điều kiện
        'loaitin'=>'required',
        'tieude'=>'required|min:10|max:200|unique:tintuc,TieuDe',
        'tomtat'=>'required',
        'noidung'=>'required',
      ],
      [
        'loaitin.required'=>'bạn chưa chọn loại tin',
        'tieude.required'=>'bạn chưa điền tiêu đề',
        'tieude.min'=>'tiêu đề nằm trong khoảng 10 đến 200 kí tự',
        'tieude.max'=>'tiêu đề nằm trong khoảng 10 đến 200 kí tự',
        'tieude.unique'=>'tiêu đề đã bị trùng',
        'tomtat.required'=>'chưa nhập tóm tắt',
        'noidung.required'=>'chưa điền nội dung',
      ]);

       
        $tintuc->TieuDe=$request->tieude;
        $tintuc->TieuDekhongDau=changeTitle($request->tieude);
        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TomTat=$request->tomtat;
        $tintuc->NoiDung=$request->noidung;
        $tintuc->SoLuotXem=0;
        // xét điều kiện và xử lí những hình ảnh
        if($request->hasfile('hinh')){
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
              $duoi = $file->getClientOriginalExtension();
              if($duoi !='jpg' && $duoi!='png' ){
                return redirect('admin/tintuc/them')->with('thongbao','bạn chỉ nhập đuôi jpg hoặc png thôi');
              }
             $hinh= str_random(4)."_".$name;
             echo $hinh;
             while (file_exists('upload/images/tin-tuc/'.$hinh)) {
               # code...
               $hinh= str_random(4)."_".$name;
             }
             $file->move('upload/images/tin-tuc',$hinh);
             unlink('upload/images/tin-tuc/'.$tintuc->Hinh);
             $tintuc->Hinh=$hinh;

           }
        else{
           $tintuc->Hinh='';
        }
        $tintuc->save();
          return redirect('admin/tintuc/sua/'.$id)->with('thongbao','bạn đã sửa thành công');
    }
    //////////////////////////////////////
      public function getthem(){
        $loaitin =loaitin::all();
        $theloai=theloai::all();
    	return view('giaodienadmin.tintuc.them',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postthem(Request $request){
        $tintuc=new tintuc;
      $this->validate($request,
      [
        // điều kiện
        'loaitin'=>'required',
        'tieude'=>'required|min:10|max:200|unique:tintuc,TieuDe',
        'tomtat'=>'required',
        'noidung'=>'required',
      ],
      [
        'loaitin.required'=>'bạn chưa chọn loại tin',
        'tieude.required'=>'bạn chưa điền tiêu đề',
        'tieude.min'=>'tiêu đề nằm trong khoảng 10 đến 200 kí tự',
        'tieude.max'=>'tiêu đề nằm trong khoảng 10 đến 200 kí tự',
        'tieude.unique'=>'tiêu đề đã bị trùng',
        'tomtat.required'=>'chưa nhập tóm tắt',
        'noidung.required'=>'chưa điền nội dung',
      ]);

       
        $tintuc->TieuDe=$request->tieude;
        $tintuc->TieuDekhongDau=changeTitle($request->tieude);
        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TomTat=$request->tomtat;
        $tintuc->NoiDung=$request->noidung;
        $tintuc->SoLuotXem=0;
        // xét điều kiện và xử lí những hình ảnh
        if($request->hasfile('hinh')){
             $file= $request->file('hinh');
             $name = $file->getClientOriginalName();
              $duoi = $file->getClientOriginalExtension();
              if($duoi !='jpg' && $duoi!='PNG' ){
                return redirect('admin/tintuc/them')->with('thongbao','bạn chỉ nhập đuôi jpg hoặc png thôi');
              }
             $hinh= str_random(4)."_".$name;
             echo $hinh;
             while (file_exists('upload/images/tin-tuc/'.$hinh)) {
               # code...
               $hinh= str_random(4)."_".$name;
             }
             $file->move('upload/images/tin-tuc',$hinh);
             $tintuc->Hinh=$hinh;

           }
        else{
           $tintuc->Hinh='';
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','thêm thành công');
    }
}
