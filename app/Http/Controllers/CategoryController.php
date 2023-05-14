<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $page='index';
        $categories=Category::latest()->get();
        return view('admin.category.index',compact('categories'))->with('category',$categories)
        ->with('page',$page);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=new Category();
        $page='Create';

        return view('admin.category.form')->with('category',$category)->with('page',$page);
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
    //    return "welcoem";
        //
        $request->validate(
            [
                'Name_en'=>'required',
                'Name_ar'=>'required',
            ]
        );
        $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

        Category::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'sluge'=>Str::slug($request->Name_en)
        ]);
        return redirect()->route('admin.category.index');
    }

    /* 
    /*
    $name=
    [ 
        mecammera  -- front  .. 
    'en'=>$req=>Name_en ,
    'ar' =>$req=>Name_ar];

    // 

    Category::create();
// (
    $request->all()
) '' 
// data base coulm tow .. colum one name 
latest()->get();
// paginatinte(10);
 name == name_ar , name_en 
 
    // $var='name'
    [ // take elements  ]
       $name=[
        'en'=>$request->Name_en,
        'ar'=>$request->Name_ar,
       ];
        category::create([
            //  'name=>$request->input('name') ** /\!!!!!!1/ هاد اسمو هبل في هاي الحالة 
            'name'=>json_encode($name),
            'sluge'=>Str::slug($request->Name_en)
       ])
(
    [
        
    ]
)

    name / 
    // json_encode();
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "w";
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
        $category=Category::findOrFail($id);
        $page='Edit';

        return view('admin.category.form')->with('category',$category)->with('page',$page);
        
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
                'Name_en'=>'required',
                'Name_ar'=>'required',
            ]
        );
        $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

        Category::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'sluge'=>Str::slug($request->Name_en)
        ]);
        return redirect()->route('admin.category.index');
 
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
        //
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.category.index')->with('msg','category trashed successful ')->with('type','danger') ;
    }
 
    public function trash()
    {
        $page='Trash';
        
        $categories=Category::onlyTrashed()->latest()->get();
        return view('admin.category.index',compact('categories'))->with('category',$categories)->with('page',$page);
        ;
      
       
        # code...


    }
    
    public function restore($id)
    {
        // return 'a';
        $category=Category::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.category.index')->with('msg','category restore successful ')->with('type','danger') ;

        # code...
    }
    public function forcedelete($id)
    {
        $category=Category::withTrashed()->findOrFail($id)->forcedelete();
        return redirect()->route('admin.category.index')->with('msg','category finaly  successful ')->with('type','danger') ;

    }
    // latest()->get()

    //forcedelete where('id',=,$id)->get()
     
    // Category::all();


// public function finaly($id)

// {
//     $categories=Cateory::withTrashed()->findorFail($id)->forcedelete();
//     # code...
// }
// public function freset($id)

// {
//     $categories=Cateory::withTrashed()->findorFail($id)->restore();
//     # code...
// }

}
