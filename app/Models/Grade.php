<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Section;

class Grade extends Model
{
    use HasTranslations;

    protected $fillable= [
        'Name',
        'Notes'
        ];
    public  $translatable = ['Name'];



    protected $table = 'Grades';
    public $timestamps = true;


//    علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function Section(){
        return $this->hasMany(Section::class ,'Grade_id');
    }

}
