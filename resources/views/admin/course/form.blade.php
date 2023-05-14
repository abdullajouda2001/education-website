@extends('admin.master')
@section('title','category')
@section('content')
<div class="d-flex justify-content-between align-items-center ">

</div>
<div class="container card mt-5">
<h1>
 
 Admin Create  Course 
 </h1>
    <form encytype="multipart/form-data" action="@if($page=='Create')
     {{route('admin.course.store')}}
     @else
     {{route('admin.course.update',$course->id)}}
     
     
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
 
        <input  name="Name_en" value="{{ old('Name_en'),$course->name }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_en')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    <div class="my-3">
        <lable for="">
           Name Ar
        </lable>
 
        <input  name="Name_ar" value="{{ old('Name_ar'),$course->name }}" type="text" class="form-control @error('Name_en') is-invalid @enderror">
       @error('Name_ar')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>


    <div class="my-3">
        <lable for="">
         price 
        </lable>

        <input  name="price" value="{{ old('price'),$course->price }}" type="number" class="form-control @error('price') is-invalid @enderror">
       @error('price')
        <p class="text-danger">{{$message}} </p>  
        @enderror
    </div>

    <div class="my-3">
        <lable for="">
        descount
        </lable>
 
        <input  name="descount" value="{{ old('descount'),$course->descount }}" type="number" class="form-control @error('descount') is-invalid @enderror">
       @error('descount')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>


    
    <div class="my-3">
        <lable for="">
          external contint english
        </lable>
 
        <textarea cols="4" role="3"  name="external_contint_en" value="{{ old('external_contint_en'),$course->external_contint_en }}"  class="form-control @error('external_contint_en') is-invalid @enderror">
        {{ old('external_contint_en'),$course->external_contint_en }}
      </textarea>
        @error('external_contint_en')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>

    <div class="my-3">
        <lable for="">
          external contint arbic
        </lable>
 
        <textarea cols="4" role="3"  name="external_contint_ar" value="{{ old('external_contint_ar'),$course->external_contint_ar }}"  class="form-control @error('external_contint_ar') is-invalid @enderror">
        {{ old('external_contint_ar'),$course->external_contint_ar }}
      </textarea>
        @error('external_contint_ar')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
 
   
    <div class="my-3">
        <lable for="">
        internal_contint english
        </lable>
 
        <textarea cols="4" role="3"  name="internal_contint_en" value="{{ old('internal_contint_en'),$course->internal_contint_en }}"  class="form-control @error('internal_contint_en') is-invalid @enderror">
        {{ old('internal_contint_en'),$course->internal_contint_en }}
      </textarea>
        @error('internal_contint_en')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>

    <div class="my-3">
        <lable for="">
        internal_contint arbic
        </lable>
 
        <textarea cols="4" role="3"  name="internal_contint_ar" value="{{ old('internal_contint_ar'),$course->internal_contint_ar }}"  class="form-control @error('internal_contint_ar') is-invalid @enderror">
        {{ old('internal_contint_ar'),$course->internal_contint_ar }}
      </textarea>
        @error('internal_contint_ar')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
 
    <div class="my-3">
        <lable for="">
        image
        </lable>
        @if($course->image)
   <img width="100" src="{{asset('uploads/'.$course->image)}}" width="100" alt="">
   @endif
 
        <input  name="image" type="file" class="form-control @error('image') is-invalid @enderror">
       @error('image')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
    
    <div class="my-3">
        <lable for="">
        type
        </lable>
 
        <select  name="type"  class="form-control @error('type') is-invalid @enderror">
         <option value="">Select</option>
         <option value="free"@if(old('type',$course->type)== 'free' ) selected @endif>free</option>
         <option value="payment"@if(old('type',$course->type)== 'payment' ) selected @endif>payment</option>

        </select>
        @error('type')
     <p class="text-danger">{{$message}} </p>  
       @enderror
    </div>
   
    <div class="my-3">
        <lable for="">
        category
        </lable>
 
        <select  name="category"  class="form-control @error('category') is-invalid @enderror">
         <option value="">Select</option>
         @foreach($category as $item )
         <option value="{{$item->id}}" @if(old('category',$course->category_id)== $item->id ) selected @endif>
         {{$item->En()}}
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