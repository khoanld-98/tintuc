<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// lớp đăng nhập với user
use Illuminate\Support\Facades\Auth;
use App\user;
use App\comment;
class usercontroller extends Controller
{
    //
    
     public function getdanhsach(){
      $user =user::all();
    	return view('giaodienadmin.user.danhsach',['user'=>$user]);
    }

      public function getsua($id){
        $user = user::find($id);
    	return view('giaodienadmin.user.sua',['user'=>$user]);
    }
    public function postsua(Request $request,$id){
      $user = user::find($id);

      if($user->password==$request->matkhaucu){
      $this->validate($request,[
        'ten'=>'required|min:3|max:15|unique:Users,name',
      ],[
        'ten.required'=>'yêu cầu bạn nhập tên user',
        'ten.min'=>'tên phải nằm 3 đến 15 kí tự',
        'ten.max'=>'tên phải nằm 3 đến 15 kí tự',
        'ten.unique'=>'trùng với user',
      ]);
        if($request->matkhau){
            $this->validate($request,[
              'matkhau'=>'required|min:3|max:15',
              'matkhau1'=>'required|same:matkhau',
            ],[
              'matkhau.required'=>'yêu cầu bạn nhập mật khẩu',
              'matkhau.min'=>'mật khẩu phải nằm 3 đến 15 kí tự',
              'matkhau.max'=>'mật khẩu phải nằm 3 đến 15 kí tự',
              'matkhau1.required'=>'yêu cầu bạn nhập mật khẩu',
              'matkhau1.same'=>'yêu cầu bạn nhập mật khẩu phải khớp',
            ]);
            $user->password=$request->matkhau;
           }
           $user->name=$request->ten;
           $user->quyen=$request->quyen;
           $user->save();

      }
      else {
        echo $user->password;
        return redirect('admin/user/sua/'.$id)->with('thongbao','bạn không nhập được đúng với mật khẩu');
      }
    }
      public function getthem(){
    	return view('giaodienadmin.user.them');
    }
    public function postthem(Request $request){
      $user = new user;
      $this->validate($request,[
        'ten'=>'required|min:3|max:15|unique:Users,name',
        'matkhau'=>'required|min:3|max:15',
        'email'=>'required|email|unique:Users,email',
        'matkhau1'=>'required|same:matkhau',
      ],[
        'ten.required'=>'yêu cầu bạn nhập tên user',
        'ten.min'=>'tên phải nằm 3 đến 15 kí tự',
        'ten.max'=>'tên phải nằm 3 đến 15 kí tự',
        'ten.unique'=>'trùng với user',
        'matkhau.required'=>'yêu cầu bạn nhập mật khẩu',
        'matkhau.min'=>'mật khẩu phải nằm 3 đến 15 kí tự',
        'matkhau.max'=>'mật khẩu phải nằm 3 đến 15 kí tự',
        'matkhau1.required'=>'yêu cầu bạn nhập mật khẩu',
         'matkhau1.same'=>'yêu cầu bạn nhập mật khẩu phải khớp',
         'email.required'=>'yêu cầu bạn nhập email',
         'email.email'=>'chưa đúng với định dạng email',
         'email.unique'=>'email đã tồn tại',
      ]);
      $user->name=$request->ten;
      $user->password=bcrypt($request->matkhau);
      $user->email=$request->email;
      $user->quyen=$request->quyen;
      $user->save();
      return redirect('admin/user/them')->with('thongbao','bạn đã thêm thành công');
    }

    public function getxoa($id){
      $user =user::find($id);
      foreach ($user->comment as $key ) {
        # code...
        $key->delete();
      }
      $user->delete();
      return redirect('admin/user/danhsach')->with('thongbao','bạn đã xoas thành công');
    }
    // đăng nhập
    public function getdangnhapadmin(){
        return view('giaodienadmin.login');
    }
    public function postdangnhapadmin(Request $request){
        $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required|min:3|max:15'
        ],[
        'email.required'=>'yêu cầu bạn nhập email',
         'email.email'=>'chưa đúng với định dạng email',
        'matkhau.required'=>'yêu cầu bạn nhập mật khẩu',
        'matkhau.min'=>'mật khẩu phải nằm 3 đến 15 kí tự',
        'matkhau.max'=>'mật khẩu phải nằm 3 đến 15 kí tự',
        ]);
        //kiểm tra xem email và pass có đúng vơi nhập không
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('admin/home');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','đăng nhập không thành công');
        }
    }
    public function getdangxuatadmin(){
      Auth::logout();
      return redirect('admin/dangnhap');
    }
}
