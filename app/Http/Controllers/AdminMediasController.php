<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //
    public function index(){
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function show(){

    }
    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        //
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);
    }
    public function destroy($id)
    {
        $file = Photo::findOrFail($id);
        @unlink(public_path().$file->file);
        $file->delete();

        return redirect('/admin/media');
    }

    public function deleteMedia(Request $request)
    {

        if(isset($request->delete_single)){
            Session::flash('success', "media successfully deleted");
            $this->destroy($request->single_delete_id);
            return redirect()->back();
        }else if (isset($request->delete_selected) && !empty($request->deleteArray)){
            $photos = Photo::findorfail($request->deleteArray);
            foreach ($photos as $photo){
                $photo->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }

}
