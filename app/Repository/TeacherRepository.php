<?php

namespace App\Repository;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\Quizze;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers(){
        return Teacher::all();
    }

    public function getSpecializations(){
        return Specialization::all();
    }
    public function getGenders(){
        return Gender::all();
    }
    public function StoreTeachers($request){

        try {
            $Teachers = new Teacher();
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }

    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        $Teachers = $request->id;

        try {
            DB::beginTransaction();
        
            // حذف سجلات الأسئلة المرتبطة بالاختبارات
            $quizzes = Quizze::where('teacher_id', $Teachers)->get();
            $quizIds = $quizzes->pluck('id')->toArray();
            Question::whereIn('quizze_id', $quizIds)->delete();
        
            // حذف الاختبارات
            Quizze::where('teacher_id', $Teachers)->delete();
        
            Subject::where('teacher_id', $Teachers)->delete();
        
            // حذف السجل الخاص بالمعلم
            Teacher::destroy($Teachers);
        
            toastr()->error(trans('messages.Delete'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
        
    }
    

}

