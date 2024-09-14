<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display the all Slider in Table from storage.
     */
    public function index(): View
    {
        return view('admin.slider.index');
    }//End Method

    /**
     * Show the form for creating a new Slider.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }//End Method

    /**
     * Store a newly created slider in after the validation storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                        'banner'            => ['required', 'image', 'max:2048'],
                        'type'              => ['string', 'max:200'],
                        'title'             => ['required', 'max:200'],
                        'starting_price'    => ['max:200'],
                        'btn_url'           => ['url'],
                        'serial'            => ['required', 'integer'],
                        'status'            => ['required', 'in:1,0'],
                    ]);

        /** Handling the Image Upload. **/
        $banner = $this->uploadImage($request, 'banner', 'uploads/sliderImage');
        $validated['banner'] = $banner;

        Slider::create($validated);

        toastr('Succefully created an Slider', 'success');
        return redirect()->back();
    }//End Method

    /**
     * Show the form for editing the slider.
     */
    public function edit(slider $slider)
    {
        //
    }//End Method

    /**
     * Update the specified Slider in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }//End Method

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }//End Method
}
