<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='index';
        $Videos=Video::latest()->get();
        return view('admin.Video.index')->with('Videos',$Videos)
        ->with('page',$page);
        //
        //
    }

     public function trash()
    {
        $page='Trash';
        
        $Videos=Video::onlyTrashed()->latest()->get();
        return view('admin.Video.index',compact('Videos'))->with('Videos',$Videos)->with('page',$page);
        ;
      
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Video=new Video();
        $page='Create';
        $Course=Course::Select('name','id')->get();

        return view('admin.Video.form')->with('Video',$Video)->with('page',$page)->with('Course',$Course);
    
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);
        $request->validate(
            [
                'Name_en'=>'required |string|max:100',
                'Name_ar'=>'required|string|max:100',
                'time'=>'required |max:100',
                'path'=>'required|max:100',
                'image'=>'required',
                'Course'=>'required|exists:Courses,id'
            ]
        );
        // $name_image=$request->image;
       if($request->file('image')){
        $image=$request->file('image');
        $name_image= $image->rand().''.data('y-m-d').''.item().$image->getClientOriginalName();
        $request->file('image')->move('uploads',$name_image);

       }
       $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
// |mimes:jpg,jpeg,png

Video::create([
           'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
        //    'sluge'=>Str::slug($request->Name_en),
           'time'=>$request->time,
           'path'=>$request->path,
           'image'=>$request->image,
           'descount'=>$request->descount,
           'Course_id'=>$request->Course,


       ]);
    //    if($request->file('image')){
    //     $image=$request->file('image');
    //     $name_image=$image->rand().''.$image->getClinenOriginalName();
    //     $request->file('image')->move('uploads',$name_image);


    //    }


      
        return redirect()->route('admin.Vedio.index');
   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Video=Video::findOrFail($id);
        $page='Edit';
        $Course=Course::Select('name','id')->get();
        return view('admin.Video.form')
        ->with('Video',$Video)
        ->with('Course',$Course)->with('page',$page);
    
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'Name_en'=>'required |string|max:100',
                'Name_ar'=>'required|string|max:100',
                'time'=>'required |max:100',
                'path'=>'required|max:100',
                'image'=>'required',
                'Course'=>'required|exists:Courses,id'
            ]
        );
        // $name_image=$request->image;
       if($request->file('image')){
        $image=$request->file('image');
        $name_image= $image->rand().''.data('y-m-d').''.item().$image->getClientOriginalName();
        $request->file('image')->move('uploads',$name_image);

       }
       $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
// |mimes:jpg,jpeg,png

Video::findOrFail($id)->update([
           'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
        //    'sluge'=>Str::slug($request->Name_en),
           'time'=>$request->time,
           'path'=>$request->path,
           'image'=>$request->image,
           'descount'=>$request->descount,
           'Course_id'=>$request->Course,


       ]);
    //    if($request->file('image')){
    //     $image=$request->file('image');
    //     $name_image=$image->rand().''.$image->getClinenOriginalName();
    //     $request->file('image')->move('uploads',$name_image);


    //    }


      
        return redirect()->route('admin.Vedio.index');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect()->route('admin.Vedio.index')->with('msg','Video trashed successful ')->with('type','danger') ;
 
        //
    }

     public function restore($id)
    {
       
        
         // return 'a';
        $Video=Video::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.Vedio.index')->with('msg','Video restore successful ')->with('type','danger') ;

    
       
        //
    }
     public function forcedelete($id)
    {
        $Video=Video::withTrashed()->findOrFail($id)->forcedelete();
        return redirect()->route('admin.Vedio.index')->with('msg','course finaly  successful ')->with('type','danger') ;

   
        //
    }
}
