<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\slide;
use App\loaitin;
use App\tintuc;
use App\user;
use Illuminate\Support\Facades\Auth;
class pagecontroller extends Controller
{
    ///
    function __construct(){
    	$slide =slide::all();
    	$theloai= theloai::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
        
    }
    public function trangtru(){
    	
    	return view('pages.trangtru');
    }
    public function lienhe(){
        return view('pages.lienhe');

    }
    public function gioithieu(){
        return view('pages.gioithieu');
    }
    public function loaitin($id){
        $loaitin= loaitin::find($id);
        $tintuc=tintuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function tintuc($id){
        $tintuc =tintuc::find($id);
        $tinnoibat =tintuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.chitiet',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    public function getdangnhap(){
        return view('pages.dangnhap');
    }
    public function postdangnhap(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.request'=>'bạn nhập email ',
            'email.email'=>'bạn chưa nhập được đúng khuân email',
            'password.required'=>'bạn chưa nhập mật khẩu',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                 return redirect('trangchu');
        }
        else{
        return redirect('dangnhap')->with('thongbao','bạn chưa nhập đúng tài khoản');
        }
    }
    public function getdangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getnguoidung(){
       
        return view('pages.nguoidung');
    }
    public function postnguoidung(Request $request){
         $this->validate($request,[
            'name'=>'required',
            
            'password1'=>'same:password',
         ],[
            'name.required'=>'bạn chưa nhập tên',
            'password1.same'=>'chưa khớp',
         ]);
         Auth::user()->name=$request->name;
         if($request->password){
         Auth::user()->password=bcrypt($request->password);
         }
         Auth::user()->save();
         return redirect()->back()->with('thongbao','bạn đã sửa thành công');
    }
    public function getdangki(){
        return view('pages.dangki');
    }
    public function postdangki(Request $request){
         $user =new user;
        $this->validate($request,[
            'name'=>'required|min:5|max:20',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'password1'=>'required|same:password',
        ],[
            'name.required'=>'bạn chưa nhập tên',
            'name.min'=>'tên được giới hạn 5 đến 20 kí tự',
            'name.max'=>'tên giới hạn 5 đến 20 kí tự',
            'email.required'=>'chưa nhập email',
            'email.unique'=>'email đã bị trùng',
            'password.required'=>'chưa nhập mật khẩu',
            'password1.required'=>'chưa nhập mật khẩu',
            'password1.same'=>'2 mật khẩu không giống nhau',
        ]);
       
        $user->name=$request->name;
        $user->quyen=0;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('dangnhap')->with('thongbao','bạn đã đăng kí thành công, đăng nhập nào');
    }
    public function posttimkiem(Request $request){
        $tukhoa=$request->tukhoa;
        $tintuc=tintuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->orwhere('NoiDung','like',"%$tukhoa%")->take(20)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
