<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    /**
     * Display the view for the index page of Slider.
     */
    public function index(): View
    {
        return view('admin.slider.index');
    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slider $slider)
    {
        //
    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }//End Method
}
