<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $authuser = Auth::user();
            $user = User::find($authuser->id);
            $user->first_name = ucfirst(preg_replace('/\s+/', '', $request->first_name));
            $user->last_name = ucfirst($request->last_name);
            $user->name = $user->fist_name . ' ' . ucfirst($request->last_name);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->plain_pass = $request->password;
            $user->update();

            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $imageName = str_replace(' ', '_', preg_replace('/\s+/', '', $user->first_name));
                $filename = $imageName . now()->format('YmdHis') . '_' .  uniqid() . '_' . $authuser->id . '.' . $image->getClientOriginalExtension();

                $storagePathMain = public_path('admin/uploads/profile_pictures/');
                $mainImg = Image::make($image)->fit(200, 200);
                $mainImg->save($storagePathMain . $filename);

                $adminDetails = User::find($authuser->id);
                if ($adminDetails->profile_pic != '') {
                    if (File::exists($storagePathMain . $adminDetails->profile_pic)) {
                        File::delete($storagePathMain . $adminDetails->profile_pic);
                    }
                }
                $adminDetails->profile_pic = $filename;
                $adminDetails->update();
            }
            return redirect()->back()->with('success', 'Profile Updated Successfully.');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Something went wrong ' . $err);
        }
    }
}
