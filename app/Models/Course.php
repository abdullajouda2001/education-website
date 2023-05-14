<?php

namespace App\Models;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
   

    use HasFactory , SoftDeletes;    
    protected $fillable=['name','sluge','image','price','type','category_id','descount','internal_contint','external_contint'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
        # code...
    }
    public function Vedio()
    {
        return $this->hasMany(Video::class,'course_id');
        # code...
    }
    
    public function En()
    {
       $name= $this->name;
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);
    //    return $name_new;
       return  ($name_new['en']);
        # code...
    }
    public function Ar()
    {
       $name= $this->name;
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);
       return $name_new['ar'];
    //    dump($name_new['ar']);
        # code...
    }


    public function LName()
    {
       $name= $this->name;
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);
    //    app()->setLocale('ar');
       $local_name=$name_new[app()->getLocale()];
    //    dump($local_name);
       return $local_name;
    //    dump($name_new['ar']);
        # code...
    }
}
