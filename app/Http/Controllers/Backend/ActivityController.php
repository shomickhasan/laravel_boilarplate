<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\UserActivityLog;
use App\Models\User;
use App\Models\CategoryModel;

class ActivityController extends Controller
{
    public function index(){
        $activities = UserActivityLog::with('user:id,name')->orderBy('created_at','DESC')->get();
        return view('backend.pages.activityLoger.index',compact('activities'));
    }

    // auto complete

    public function auto(){
        return view('backend.pages.autocomplete');
    }

    public function search(Request $request){
        $query = $request->get('query');
        $users = User::where('name', 'LIKE', "%$query%")->get();
        if($users){
            return response()->json([
                'data'=>$users,
            ]);
        }
        else{
            return response()->json([
                'data'=>'user not found',
            ]);
        }
    }
    public function addEdit($id=null){
        //dd($id)
        if(null !== $id){
            $category = CategoryModel::find($id);
            if( $category){
                return view('backend.pages.activityLoger.add_edit_category',compact('category'));
            }
        }
        else{
            return view('backend.pages.activityLoger.add_edit_category');
        }

    }

    public function storeUpdate(Request $request, $id=null){
        $request->validate([
            'category_name'=>'required',
            'category_type'=>'required',
        ]);

        if(null !== $id ){
            $update_category = CategoryModel::find($id);
            if(!$update_category){
                return redirect()->back()->with('message','category not found!!');
            }
            else{
                $update_category->category_name= $request->category_name;
                $update_category->category_type= $request->category_type;
                $update_category->update();
                if($update_category){
                    return redirect()->back()->with('message','category Updated');
                }
                else{
                    return redirect()->back()->with('message','category not update!!');
                }
            }
        }
        else{
            $save_category = new CategoryModel;
            $save_category->category_name= $request->category_name;
            $save_category->category_type= $request->category_type;
            $save_category->save();
            if($save_category){
                return redirect()->back()->with('message','category Save');
            }
            else{
                return redirect()->back()->with('message','category not Save');
            }
        }
    }

    public function categoryIndex(){
        $categories = CategoryModel::all();
        return view('backend.pages.activityLoger.categoryindex',compact('categories'));
    }
}
