@extends('admin.master')
@section('title','category')
@section('content')
<div class="d-flex justify-content-between align-items-center ">
<h1>
 
Admin Category 
</h1>
<h2>
    {{ ($page=='Trash'? 'trashed':'category pag') }}
</h2>
<a class="btn btn-outline-info h-25" href="{{ route('admin.category.create') }}">
        Create Category
    </a>
</div>
@if(@session('msg'))
<div class="alert alert-{{@session('type')}}" role="alert">
 {{@session('msg')}}
</div>
@endif
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center m-4 ">
        <h6 class="m-0 font-weight-bold text-primary">manigmint  category</h6>
       
    </div>
    @if($page=='Trash')
    <a class="btn btn-danger py-2" href="{{route('admin.category.index')}}">
            index
    </a> 
    @else
    <a class="btn btn-danger py-2" href="{{route('admin.category.trash')}}">
        <i  class="fa-solid fa-trash"></i>Trash
    </a>
    @endif
    <div class="card-body">
         
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name English</th>
                        <th>name Arbic</th>
                        <th>name loacl</th>
                        <th>count</th>
                        @if($page=='Trash')
                        <th>restore</th>
                        @else
                        <th>edit</th>
                        @endif
                        <th>delete </th>
                       
                    </tr>
                </thead>
          
                <tbody>
                    @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->En()}}</td>
                        <td>{{$category->Ar()}}</td>
                        <td>{{$category->LName()}}</td>
                        <td>{{$category->Course->count()}}</td>
                        <td>
                        @if($page=='Trash')
                       <a class="btn btn-danger py-2" href="{{route('admin.category.restore',$category->id)}}">
               
               retore        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"> -->
                        <!-- ! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg> -->
                        <!--  -->
                    </a> 
                      @else
               <a href="{{route('admin.category.edit',$category->id)}}">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 512 512">
                            ! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                         </a> 
                  @endif
    
                        </td>
                        <td>
                        
</td>
@if($page== 'Trash') 
<td>
<form action="{{route('admin.category.forcedelete',$category->id)}}" method="post">
@csrf    
@method('delete')   
<button onclick="confirm('Are You Sure')">
    close
<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20">! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg> -->
                       
</tr>
</button>
</form>
</td>


@else
<td>
<form action="{{route('admin.category.destroy',$category->id)}}" method="post">
@csrf    
@method('delete')   
<button>
    close
<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20">! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg> -->
                       
</tr>
</button>
</form>
</td>
@endif
@endforeach
                                        
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@stop