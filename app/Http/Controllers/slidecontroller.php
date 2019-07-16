<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
class slidecontroller extends Controller
{
    //
     public function getdanhsach(){
      $slide = slide::all();
    	return view('giaodienadmin.slide.danhsach',['slide'=>$slide]);
    }

      public function getsua($id){
        $slide = slide::find($id);
    	return view('giaodienadmin.slide.sua',['slide'=>$slide]);
    }
    public function postsua(Request $request, $id){
      $slide =slide::find($id);
      $this->validate($request,[
        'ten'=>'required',
        'noidung'=>'required',
        'link'=>'required',
      ],[
        'ten.required'=>'bạn chưa nhập tên',
        'noidung.required'=>'bạn chưa nhập nội dung',
        'link.required'=>'bạn chưa nhập link',
      ]);
     
      $slide->Ten=$request->ten;
      $slide->NoiDung=$request->noidung;
      $slide->link=$request->link;
      if($request->file('hinh')){
        $file = $request->file('hinh');
        $name =$file->getClientOriginalName();
        $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg' && $duoi!='PNG'){
          return redirect('admin/slide/sua/'.$id)->with('thongbao','tên file không hợp lệ');
        }
        if($slide->Hinh){
            unlink('upload/images/slide/'.$slide->Hinh);
          }
        $hinh =str_random(4)."_".$name;
        $file->move('upload/images/slide/',$hinh);
        $slide->Hinh=$hinh;
      }
      else{
      $slide->Hinh=' ';
      }
      $slide->save();
      return redirect('admin/slide/sua/'.$id)->with('thongbao','bạn đã sửa thành công');
    }


    public function getxoa($id){
      $slide =slide::find($id);
      if (empty($slide->Hinh)==0) {
        # code...
        unlink('upload/images/slide/'.$slide->Hinh);
      }
      $slide->delete();

      return redirect('admin/slide/danhsach')->with('thongbao','bạn đã xóa thành công');
    }
      public function getthem(){
    	return view('giaodienadmin.slide.them');
    }
    public function postthem(Request $request){
      $slide = new slide;
      $this->validate($request,
      [
          'ten'=>'required|min:5',
          'noidung'=>'required|min:5', 
          'link'=>'required',
      ],
      [

        'ten.required'=>'bạn chưa nhập tên slide',
        'ten.min'=>'tên phải 5 kí tự trở lên',
        'link'=>'link phải '
      ]);
      $slide->Ten=$request->ten;
      $slide->NoiDung=$request->noidung;
      $slide->link=$request->link;
      if($request->file('hinh')){
        $file = $request->file('hinh');
        $name= $file->getClientOriginalName();
        $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg' && $duoi!='PNG'){
          return redirect('admin/slide/them')->with('thongbao','tên file của bạn không hợp lệ');
        }
        $Hinh= str_random(4)."_".$name;
        $file->move('upload/images/slide/',$Hinh);
        $slide->Hinh=$Hinh;
        
      }
      else{
        $slide->Hinh='';
      }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','bạn đã thêm thành công');
    }
}
