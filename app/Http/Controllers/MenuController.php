<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use lluminate\Support\Facades\Validator;

class MenuController extends Controller
{
    // All Menu Method
    public function AllMenu()
    {

        $menu = Menu::latest()->get();
        return view('menu.all_menu', compact('menu'));
    } // End All Menu Method

    // Add Menu Method
    public function AddMenu()
    {
        $category = Category::all();
        return view('menu.add_menu', compact('category'));
    } // End Add Menu Method

    // Store Menu Method
    public function StoreMenu(Request $request)
    {


        $validator = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'mealtag' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $image = $request->file('image');
        $nameImg = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/menu/' . $nameImg);
        $saveUrl = 'upload/menu/' . $nameImg;

        Menu::insert([
            'name' => $validator['name'],
            'category_id' => $validator['category_id'],
            'price' => $validator['price'],
            'mealtag' => $validator['mealtag'],
            'status' => $validator['status'],
            'description' => $validator['description'],
            'image' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);

        $noti = [
            'message' => 'မီနူးထည့်ခြင်း အောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.menu')->with($noti);
    } // End Store Menu Method

    // Edit Menu Method
    public function EditMenu($id)
    {
        $editMenu = Menu::findorFail($id);
        $category = Category::all();
        return view('menu.edit_menu', compact('editMenu', 'category'));
    } // End Edit Menu Method

    // Update Menu Method
    public function UpdateMenu(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'mealtag' => 'required',
            'status' => 'required',
            'description' => 'required',

        ]);

        $menuId = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $nameImg = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/menu/' . $nameImg);
            $saveUrl = 'upload/menu/' . $nameImg;

            Menu::findOrFail($menuId)->update([
                'name' => $validator['name'],
                'category_id' => $validator['category_id'],
                'price' => $validator['price'],
                'mealtag' => $validator['mealtag'],
                'status' => $validator['status'],
                'description' => $validator['description'],
                'image' => $saveUrl,
                'created_at' => Carbon::now(),

            ]);
            $noti = [
                'message' => 'မီနူးပြင်ဆင်ခြင်း အောင်မြင်ပါသည်။',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.menu')->with($noti);
        } else {
            Menu::findOrFail($menuId)->update([

                'name' => $validator['name'],
                'category_id' => $validator['category_id'],
                'price' => $validator['price'],
                'mealtag' => $validator['mealtag'],
                'status' => $validator['status'],
                'description' => $validator['description'],
                'created_at' => Carbon::now(),

            ]);
            $noti = [
                'message' => 'မီနူးပြင်ဆင်ခြင်း အောင်မြင်ပါသည်။ ပုံပြောင်းလဲမှုမရှိပါ။',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.menu')->with($noti);
        }


    } // End Update Menu Method

    // Delete Menu Method
    public function DeleteMenu($id){

        Menu::findOrFail($id)->delete();
        $noti = [
            'message' => 'မီးနူးပယ်ဖျက်ခြင်း အောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.menu')->with($noti);

    } // End Delete Menu Method

}
