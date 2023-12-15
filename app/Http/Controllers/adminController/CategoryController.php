<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = CategoryModel::where('archive', 'no')->orderby('id', 'DESC')->get();
        return view('admin.category', compact('categories'));
    }

    public function addCategory()
    {
        $isEdit = false;
        return view('admin.add-edit-category', compact('isEdit'));
    }

    public function modifyCategory($id)
    {
        $isEdit = true;
        $category = CategoryModel::where('id', $id)->where('archive', 'no')->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        return view('admin.add-edit-category', compact('isEdit', 'category'));
    }

    public function categoryAction(Request $request)
    {
        try {
            dd($request->toArray());
        } catch (\Exception $err) {
            // dd($err);
            return redirect()->back()->with('error', 'Something went wrong ');
        }
    }

    public function deleteCategory(Request $request)
    {
        try {
            if ($request->id == '') {
                return response()->json(['status' => 'false', 'messege' => 'Category Not Found.']);
            }

            $category = CategoryModel::where('id', $request->id)->where('archive', 'no')->first();
            if (!$category) {
                return response()->json(['status' => 'false', 'messege' => 'Category Not Found.']);
            }
            //check if this category have active products or not

            // $productsCount = Products::where('category', $request->id)->where('archive', 'id')->count();
            // if ($productsCount > 0) {
            //     return response()->json(['status' => 'false', 'messege' => 'Category has ' . $productsCount . ' active products delete them first.']);
            // }

            $category->archive = 'yes';
            $category->update();
            return response()->json(['status' => 'true', 'messege' => 'Category deleted successfully.', 'data' => []]);
        } catch (\Exception $err) {
            return response()->json(['status' => 'false', 'messege' => 'Something Went Wrong ' . $err]);
        }
    }

    public function changeCategoryStatus(Request $request)
    {
        try {
            if ($request->id == '') {
                return response()->json(['status' => 'false', 'messege' => 'Category Not Found.']);
            }

            $category = CategoryModel::where('id', $request->id)->where('archive', 'no')->first();
            if ($category) {
                if ($request->status == 'active') {
                    CategoryModel::where('id', $request->id)->where('archive', 'no')->update(['status' => 'inactive']);
                } else {
                    CategoryModel::where('id', $request->id)->where('archive', 'no')->update(['status' => 'active']);
                }
                return response()->json(['status' => 'true', 'messege' => 'Category status updated.', 'data' => ['status' => $request->status]]);
            } else {
                return response()->json(['status' => 'false', 'messege' => 'Category Not Found.']);
            }
        } catch (\Exception $err) {
            return response()->json(['status' => 'false', 'messege' => 'Something Went Wrong ' . $err]);
        }
    }
}
