<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\View\View;

class VendorProfileController extends Controller
{
    /** Just serve the view for the user nothing else. **/
    public function index(): View
    {
        return view('frontend.dashboard.profile');
    }//End Method
    
    /** Updates the User basic Informaton with validation. **/
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'image' => ['image', 'max:2048']
        ]);
        
        if($request->hasFile('image')) {
            
            if(File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            
            $path = "/uploads/" . $imageName;
            
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Updated sucessfully');
        return redirect()->back();
    }//End Method
    
    /** Updates the Password of the user, with proper validation. **/
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->success('Password Updated sucessfully');
        return redirect()->back();
    }//End Method
}
