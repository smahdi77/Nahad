<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function create_lesson(CreateRequest $request,$course_id)
    {
        // create lesson in DB
        $lesson = Lesson::create([
           'name' => $request->name,
           'price' =>$request->price
        ]);
        // create data in relation table
        $lesson->courses()->attach($course_id);

        if ($lesson)
            return 'درس با موفقیت افزوده شد.';
        else
            return 'خطا رخ داده است!';
    }

    public function update_course_price(Request $request,$course_id)
    {
        // validate all requests
        $validator = Validator::make($request->all(),
            ['price' => 'required|integer|min:0|max:90000000'],
            [
                'price.required' => 'فیلد قیمت اجباری است.',
                'price.integer' => 'فیلد قیمت باید از نوع عددی باشد',
                ]);

        if ($validator->fails())
            // print error validation
            return $validator->errors();
        else {
            // update course price
            $course_update = Course::where('course_id',$course_id)
                ->update(['price' => $request->price]);
            if ($course_update == 1)
                return 'قیمت دوره با موفقیت ویرایش شد.';
            else
                return 'خطا رخ داده است!';
        }
    }
}
