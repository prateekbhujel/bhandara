<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the Sub-Category.
     */
    public function index(SubCategoryDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.sub-category.index');
    }//End Method

    /**
     * Show the form for creating a new Sub-Category.
     */
    public function create(): View
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-category.create', compact('categories'));
    }//End Method

    /**
     * Store a newly created Sub-Category in storage.
     */
    public function store(Request $request)
    {
       $valiatedData = $request->validate([
            'category_id' => ['required'],
            'name'        => ['required', 'max:200', 'unique:sub_categories,name'],
            'status'      => ['required'] 
        ]);
        $valiatedData['slug'] = Str::slug($request->name);
        SubCategory::create($valiatedData);
        
        toastr('Data Created Successfully!', 'success');
        return redirect()->route('admin.sub-category.index');
    }//End Method

    /**
     * Show the form for editing the specified Sub-Category.
     */
    public function edit(SubCategory $subCategory): View
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }//End Method

    /**
     * Update the specified Sub-Category in storage.
     */
    public function update(Request $request,SubCategory $subCategory)
    {
        $valiatedData = $request->validate([
            'category_id' => ['required'],
            'name'        => ['required', 'max:200', 'unique:sub_categories,name,' . $subCategory->id],
            'status'      => ['required'] 
        ]);
        $valiatedData['slug'] = Str::slug($request->name);
        $subCategory->update($valiatedData);

        toastr('Data Updated Successfully!', 'success');
        return redirect()->route('admin.sub-category.index');
    }//End Method

    /**
     * Change the status of the Sub category from table view or index view custom method.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        // Find the category by its ID
        $subCategory = SubCategory::find($request->id);

        // Return error if sub category not found
        if (!$subCategory) {
            return response(['status' => 'error', 'message' => 'Sub Category not found.'], 404);
        }

        // Ensure the status is either 0 or 1
        if ($request->has('status')) {
            // Convert 'true' or 'false' to 1 or 0
            $status = $request->status == 'true' ? 1 : 0;
            $subCategory->update(['status' => $status]);

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

    /**
     * Remove the specified Sub-Category from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return response(['status' => 'success', 'message' => 'Data Delete Successfully!']);
    }//End Method
}
