<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public  $translatable = ['Name_Section'];

    protected $fillable=['Name_Section','Grade_id','Classroom_id'];


    protected $table = 'sections';
    public $timestamps = true;

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


//    علاقة بين الاقسام و الصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'Class_id');
    }
    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }

}
