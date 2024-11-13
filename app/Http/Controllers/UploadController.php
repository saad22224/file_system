<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class UploadController extends Controller
{


    public function index() {
        $allImages = image::all();
        return view('images' , compact('allImages'));
    }


    public function show(Request $request)
    {
        $request->validate([
            'images.*' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:2048',
        ]);
        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                $name = $image->getClientOriginalName();
                    $path = $image->storeAs('images' , $name , 'public');
                    image::create([
                        'path'=>$path
                    ]);
                    $paths[] = $path;
                } else {
                    return 'not valid';
                }
            };
            return redirect()->route('images');
        } else {
            return back()->with('error', 'no images is here');
        }
    }
}






// class UploadController extends Controller
// {
//     public function show(Request $request)
//     {
//         // التحقق من الفاليديشن
//         $request->validate([
//             'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // يجب استخدام "images.*"
//         ]);

//         // التحقق من وجود الصور في الطلب
//         if ($request->hasFile('images')) {
//             $paths = [];  // مصفوفة لتخزين المسارات

//             // التحقق من أن كل صورة صالحة
//             foreach ($request->file('images') as $image) {
//                 if ($image->isValid()) {  // التحقق من أن الصورة صالحة
//                     // تخزين الصورة في المجلد "images" داخل التخزين العام
//                     $path = $image->store('images', 'public');
//                     $paths[] = $path;  // إضافة المسار إلى المصفوفة
//                 } else {
//                     return 'صورة غير صالحة';
//                 }
//             }

//             // إعادة التوجيه مع عرض الرسالة والمسارات
//             return back()->with('success', 'تم رفع الصور بنجاح')->with('image_paths', $paths);
//         } else {
//             return back()->with('error', 'لم يتم رفع أي صور');
//         }
//     }
// }
