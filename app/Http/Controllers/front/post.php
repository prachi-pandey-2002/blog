<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class post extends Controller
{
    function home(){
        $data['result']= DB::table('posts')->get();
        return view('front.home',$data);
    }
    function post($id){
        $data['result']= DB::table('posts')->where('slug',$id)->get();
        return view('front.post',$data);
    }
    public static function page_menu(){
       $result = DB::table('pages')->where('status','1')->get();
       return $result;
    }
    function page($id){
        $data['result']= DB::table('pages')->where('slug',$id)->get();
        return view('front.page',$data);
    }
    function contact(){
        return view('front.contact');
    }
    function contact_submit(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'message'=>'required'
            ]);
          
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'message'=>$request->input('message'),
                'added_on'=>date('Y-m-d h:i:s'),
            );
            DB::table('contacts')->insert($data);
            return redirect('/');
    
        
    }
}
