@extends('admin.master')
@section('title','category')
@section('content')
<div class="d-flex justify-content-between align-items-center ">

</div>
<div class="container card mt-5">
<h1>
 
 Admin Create  Category 
 </h1>
    <form action="@if($page=='Create')
     {{route('admin.category.store')}}
     @else
     {{route('admin.category.update',$category->id)}}
     
     
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
 
        <input  name="Name_en" value="{{ old('Name_en'),$category->Name_en }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_en')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    <div class="my-3">
        <lable for="">
           Name Ar
        </lable>
 
        <input  name="Name_ar" value="{{ old('Name_ar'),$category->name }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_ar')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    <button class="btn btn-info w-100" type="submit">create </button>
</form>
</div>
@stop