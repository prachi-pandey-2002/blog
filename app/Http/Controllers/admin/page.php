<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class page extends Controller
{
    function list(){
        $data['result']=DB::table('pages')->orderBy('id','desc')->get();
        return view('admin/page/list',$data);
    }
    function submit(Request $request){
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages',
            'description'=>'required'
        ]);
      
        $data=array(
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );
        DB::table('pages')->insert($data);
        $request->session()->flash('msg','Data Saved');
        return redirect('admin\page\list');

    }
    function delete($id,Request $request){
        DB::table('pages')->where('id',$id)->delete();
        $request->session()->flash('msg','Page Deleted');
        return redirect('admin/page/list');

    }
    function edit($id,Request $request){
       $data['result']= DB::table('pages')->where('id',$id)->get();
        return view('admin/page/edit',$data);

    }
    function update($id,Request $request){
       $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required'
        ]);
        $data=array(
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')
        );
          
     DB::table('pages')->where('id',$id)->update($data);
     $request->session()->flash('msg',"Page Updated");
     return redirect('/admin/page/list');
 
     }
}
