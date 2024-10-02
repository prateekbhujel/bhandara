<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the with datables for brand.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }//End Method

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('admin.brand.create');
    }//End Method

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request)
    {
        //
    }//End Method

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }//End Method

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }//End Method

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response(['status' => 'success', 'message' => 'Data Deleted Successfully!']);
    }//End Method

    /**
     * Change the status of the category from table view or index view custom method.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        // Find the category by its ID
        $brand = Brand::find($request->id);

        // Return error if brand not found
        if (!$brand) {
            return response(['status' => 'error', 'message' => 'Brand not found.'], 404);
        }

        // Ensure the status is either 0 or 1
        if ($request->has('status')) {
            // Convert 'true' or 'false' to 1 or 0
            $status = $request->status == 'true' ? 1 : 0;
            $brand->update(['status' => $status]);

            // Determine status text and class based on the new status
            $statusText = $status ? 'Active' : 'Inactive';
            $statusClass = $status ? 'badge-success' : 'badge-danger';

            // Return success response with updated status information
            return response([
                'status' => 'success',
                'message' => 'Status updated successfully',
                'statusText' => $statusText,
                'statusClass' => $statusClass
            ]);
        }

        // Return error response for invalid status value
        return response()->json(['status' => 'error', 'message' => 'Invalid status value.'], 400);
    }//End Method
}
