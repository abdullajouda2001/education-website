@extends('admin.master')
@section('title','Vedio')
@section('content')
<div class="d-flex justify-content-between align-items-center ">

</div>
<div class="container card mt-5">
<h1>
 
 Admin Create  Vedio 
 </h1>
    <form encytype="multipart/form-data" action="@if($page=='Create')
     {{route('admin.Vedio.store')}}
     @else
     {{route('admin.Vedio.update',$Video->id)}}
     
     
     @endif
     "
     method="post">
     @if($page=='Edit')
     @method('put')
      @endif
        @csrf
    <div class="my-3">
        <lable for="">
          Name En
        </lable>
 
        <input  name="Name_en" value="{{ old('Name_en'),$Video->name }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_en')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    <div class="my-3">
        <lable for="">
           Name Ar
        </lable>
 
        <input  name="Name_ar" value="{{ old('Name_ar'),$Video->name }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_ar')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>


    <div class="my-3">
        <lable for="">
        time 
        </lable>

        <input  name="time" value="{{ old('time'),$Video->time }}" type="text" class="form-control @error('price') is-invalid @enderror">
       @error('time')
        <p class="text-danger">{{$message}} </p>  
        @enderror
    </div>

    <div class="my-3">
        <lable for="">
        path
        </lable>
 
        <input  name="path" value="{{ old('path'),$Video->path }}" type="text" class="form-control @error('descount') is-invalid @enderror">
       @error('path')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>


    

 
   
 
    <div class="my-3">
        <lable for="">
        image
        </lable>
        @if($Video->image)
   <img width="100" src="{{asset('uploads/'.$Video->image)}}" name="image" width="100" alt="">
   @endif
 
        <input  name="image" type="file" class="form-control @error('image') is-invalid @enderror">
       @error('image')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    
   
    <div class="my-3">
        <lable for="">
        category
        </lable>
 
        <select  name="Course_id"  class="form-control @error('Course') is-invalid @enderror">
         <option value="">Select</option>
         @foreach($Course as $item )
         <option value="{{$item->id}}" @if(old('Course',$Video->Course_id)== $item->id ) selected @endif>
         {{$item->name}}
        </option>
         @endforeach
        </select>
        @error('category')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
 
    
    <button class="btn btn-info w-100" type="submit">create </button>
</form>
</div>
@stop