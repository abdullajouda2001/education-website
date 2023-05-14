<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='index';
        $courses=Course::latest()->get();
        return view('admin.course.index',compact('courses'))->with('courses',$courses)
        ->with('page',$page);
        //
        //
    }

     public function trash()
    {
        $page='Trash';
        
        $courses=Course::onlyTrashed()->latest()->get();
        return view('admin.course.index',compact('courses'))->with('courses',$courses)->with('page',$page);
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
        $course=new Course();
        $page='Create';
        $category=Category::Select('name','id')->get();

        return view('admin.course.form')->with('course',$course)->with('page',$page)->with('category',$category);
    
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
                'price'=>'required |max:4',
                'descount'=>'required|max:3',
                'category'=>'required|exists:categories,id',
                'external_contint_en'=>'required |string|max:1000',
                'external_contint_ar'=>'required |string|max:1000',
                'internal_contint_en'=>'required |string|max:1000',
                'internal_contint_ar'=>'required |string|max:1000',
                'image'=>'required',
                'type'=>'required',
                // "Category"=>'required |exists:Categories,id',
            ]
        );
        // $name_image=$request->image;
    
        $name_image=0;
        if($request->file('image')){
            $image=$request->file('image');
            $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginalName();
            $request->file('image')->move('uploads',$name_image);
            dd($name_image);
       
           }
           
           $external_contint=['en'=>$request->external_contint_en,'ar'=>$request->external_contint_ar];
       $internal_contint=['en'=>$request->internal_contint_en,'ar'=>$request->internal_contint_ar];
       $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
// |mimes:jpg,jpeg,png

       Course::create([
           'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
           'sluge'=>Str::slug($request->Name_en),
           'internal_contint'=>json_encode($internal_contint,JSON_UNESCAPED_UNICODE),
           'external_contint'=>json_encode($external_contint,JSON_UNESCAPED_UNICODE),
           'price'=>$request->price,
           'image'=>$name_image,
           'descount'=>$request->descount,
           'type'=>$request->type,
           'category_id'=>$request->category,


       ]);
    //    if($request->file('image')){
    //     $image=$request->file('image');
    //     $name_image=$image->rand().''.$image->getClinenOriginalName();
    //     $request->file('image')->move('uploads',$name_image);


    //    }


      
        return redirect()->route('admin.course.index');
   
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
        $course=Course::findOrFail($id);
        $page='Edit';
        $category=Category::Select('name','id')->get();
        return view('admin.course.form')
        ->with('category',$category)
        ->with('course',$course)->with('page',$page);
    
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
                'price'=>'required |max:4',
                'descount'=>'required|max:3',
                'category'=>'required|exists:categories,id',
                'external_contint_en'=>'required |string|max:1000',
                'external_contint_ar'=>'required |string|max:1000',
                'internal_contint_en'=>'required |string|max:1000',
                'internal_contint_ar'=>'required |string|max:1000',
                'image'=>'required',
                'type'=>'required',
            ]
        );
        // $name_image=$request->image;
       if($request->file('image')){
        $image=$request->file('image');
                $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginalName();
        $request->file('image')->move('uploads',$name_image);
   
       }
       $external_contint=['en'=>$request->external_contint_en,'ar'=>$request->external_contint_ar];
       $internal_contint=['en'=>$request->internal_contint_en,'ar'=>$request->internal_contint_ar];
       $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
// |mimes:jpg,jpeg,png

       Course::findOrFail($id)->update([
           'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
           'sluge'=>Str::slug($request->Name_en),
           'internal_contint'=>json_encode($internal_contint,JSON_UNESCAPED_UNICODE),
           'external_contint'=>json_encode($external_contint,JSON_UNESCAPED_UNICODE),
           'price'=>$request->price,
           'image'=>$name_image,
           'descount'=>$request->descount,
           'type'=>$request->type,
           'category_id'=>$request->category,


       ]);
    //    if($request->file('image')){
    //     $image=$request->file('image');
    //     $name_image=$image->rand().''.$image->getClinenOriginalName();
    //     $request->file('image')->move('uploads',$name_image);


    // /
        return redirect()->route('admin.course.index');
 
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.course.index')->with('msg','course trashed successful ')->with('type','danger') ;
 
        //
    }

     public function restore($id)
    {
       
        
         // return 'a';
        $course=Course::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.course.index')->with('msg','course restore successful ')->with('type','danger') ;

    
       
        //
    }
     public function forcedelete($id)
    {
        $course=Course::withTrashed()->findOrFail($id)->forcedelete();
        return redirect()->route('admin.course.index')->with('msg','course finaly  successful ')->with('type','danger') ;

   
        //
    }
}
