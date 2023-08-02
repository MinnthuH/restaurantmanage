<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     //All Category Method
     public function AllCategory(){
        $allCategory = Category::latest()->get();
        return view('category.all_category',compact('allCategory'));
    } // End All Category Method

    // Add Category Method
    public function AddCategory(Request $request){
     Category::insert([
        'name' => $request->name,
        'created_at' => now(),
     ]);
     $noti = [
        'message' => 'အမျိုးအစား ထည့်ခြင်း အောင်မြင်ပါသည်။',
        'alert-type' => 'success',
    ];

     return redirect()->route('all.category')->with($noti);
    }

    // Edit Category Method
    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('category.edit_category',compact('category'));
    } // End Edit Category Method

    // Update Category Method
    public function UpdateCategory(Request $request){
        $categroyId = $request->id;
        Category::findOrFail($categroyId)->update([
            'name' =>$request ->name,
            'created_at' =>Carbon::now(),
        ]);

        $noti = [
            'message' => 'အမျိုးအစား ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];

         return redirect()->route('all.category')->with($noti);

    } // End Update Category Method

    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();

        $noti = [
            'message' => 'အမျိုးအစား ဖျက်ခြင်း အောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];

         return redirect()->route('all.category')->with($noti);
    } // End Delete Category Method
}
