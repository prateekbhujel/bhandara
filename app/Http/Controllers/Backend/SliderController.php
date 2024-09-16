<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display the all Slider in Table from storage using Yajra databale to render an view.
     */
    public function index(SliderDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.slider.index');
    } //End Method

    /**
     * Show the form for creating a new Slider.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    } //End Method

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
        $sliderImage = $this->uploadImage($request, 'banner', 'uploads/sliderImage');
        $validated['banner'] = $sliderImage;

        Slider::create($validated);

        toastr('Data Created.', 'success');
        return redirect()->route('admin.slider.index');
    } //End Method

    /**
     * Show the form for editing the slider.
     */
    public function edit(Slider $slider): View
    {
        return view('admin.slider.edit', compact('slider'));
    } //End Method

    /**
     * Update the specified Slider in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'banner'            => ['nullable', 'image', 'max:2048'],
            'type'              => ['string', 'max:200'],
            'title'             => ['required', 'max:200'],
            'starting_price'    => ['max:200'],
            'btn_url'           => ['url'],
            'serial'            => ['required', 'integer'],
            'status'            => ['required', 'in:1,0'],
        ]);

        /** Handling the Image Upload. **/
        $sliderImage = $this->updateImage($request, 'banner', 'uploads/sliderImage', $slider->banner);
        $validated['banner'] = empty(!$sliderImage) ? $sliderImage : $slider->banner;

        $slider->update($validated);

        toastr('Data Updated.', 'success');
        return redirect()->route('admin.slider.index');
    } //End Method

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(Slider $slider)
    {
        $this->deleteImage($slider->banner);
        $slider->delete();

        return response(['status' => 'success', 'message' => 'Data delete successfully.']);
    } //End Method
}
