<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class AdminVendorProfileController extends Controller
{
    /**
     * Display a listing of the Vendor Profile.
     */
    public function index()
    {
        return view('admin.vendor-profile.index');
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
        dd($request->all());
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
