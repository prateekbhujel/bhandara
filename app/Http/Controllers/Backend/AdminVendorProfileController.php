<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Auth;
use Illuminate\Http\Request;

class AdminVendorProfileController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the Vendor Profile.
     */
    public function index()
    {
        $profile = Vendor::where('user_id', Auth::user()->id)->first();

        return view('admin.vendor-profile.index', compact('profile'));
    }//End Method

    /**
     * Show the form for creating a new Vendor Profile.
     */
    public function create()
    {
        //
    }//End Method

    /**
     * Store a newly created Vendor Profile in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'banner'        => ['nullable', 'max:3048', 'image'],
            'phone'         => ['required', 'max:50', 'min:10'],
            'email'         => ['required', 'email', 'max:50', 'min:6'],
            'address'       => ['required', 'min:2'],
            'description'   => ['required', 'min:2'],
            'fb_link'       => ['nullable', 'url' ,'min:8'],
            'insta_link'    => ['nullable', 'url' ,'min:8'],
            'wa_link'       => ['nullable', 'url' ,'min:8'],
            'tw_link'       => ['nullable', 'url' ,'min:8'],
       ]);
       $vendor = Vendor::where('user_id', Auth::user()->id)->first();
       $bannerPath = $this->updateImage($request, 'banner', 'uploads/VendorImage', $vendor->banner);
       if ($request->hasFile('banner'))
            $validated['banner'] = $bannerPath;

       $vendor->update($validated);

       toastr('Data Updated Successfully!', 'success');
       return redirect()->back();
    }//End Method


    /**
     * Show the form for editing the specified Vendor Profile.
     */
    public function edit(Vendor $vendor_profile)
    {
        return view('admin.vendor-profile.edit', compact('vendor_profile'));
    }//End Method

    /**
     * Update the specified Vendor Profile in storage.
     */
    public function update(Request $request, Vendor $vendor_profile)
    {
        //
    }//End Method

    /**
     * Remove the specified Vendor Profile from storage.
     */
    public function destroy(Vendor $vendor_profile)
    {
        //
    }//End Method
}
