<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=['name','sluge'];

    public function TransName()
    {
       $name= $this->name;
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);
       return $name_new;
    //    dump($name_new['ar']);
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
    public function Course()
    {
        return $this->hasMany(Course::class,'category_id');
        # code...
    }
}
