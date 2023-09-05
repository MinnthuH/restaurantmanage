<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //All Tables Method
    public function AllTables(){
        $tables = Table::latest()->get();
        return view('tables.all_tables',compact('tables'));
    } // End All Tables Method

    // Store Table Method
    public function StoreTable(Request $request){
       $validator = $request->validate([
           'name' => 'required|unique:tables|max:100',
        ]);

        Table::insert([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $noti = [
            'message' => 'Table ထည့်သွင်းခြင်းအောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.tables')->with($noti);

    }// End Store Table Method

    // Edit Table Method
    public function EditTable($id){
        $table = Table::findOrFail($id);
        return view ('tables.edit_tables',compact('table'));
    } // End Edit Table Method

    // Update Table Method
    public function UpdateTable(Request $request){
        $validator = $request->validate([
            'name' => 'required|unique:tables|max:100',
        ]);

        $id = $request->id;
        Table::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        $noti = [
            'message' => 'Table ပြင်ဆင်ခြင်းအောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.tables')->with($noti);

    } // End Update Table Method

    // Delete Table Method
    public function DeleteTable($id){
        Table::findOrFail($id)->delete();
        $noti = [
            'message' => 'Table ဖျက်ခြင်းအောင်မြင်ပါသည်။',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.tables')->with($noti);
    } // End Delete Table Method


}
