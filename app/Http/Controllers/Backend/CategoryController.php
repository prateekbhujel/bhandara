<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class CategoryController extends Controller
{
     /**
     * Display the all Category in Table from storage using Yajra databale to render an view.
     */
    public function index(CategoryDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.category.index');
    }//End Method

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }//End Method

    /**
     * Store a newly created category in storage after the validation.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
                        'icon'      =>  ['required', 'not_in:empty'],
                        'name'      =>  ['required', 'max:200', 'unique:categories,name'],
                        'status'    =>  ['required', 'in:1,0'],
                    ]);
        $validated['slug'] =  Str::slug($request->name);
        
        Category::create($validated);
        
        toastr('Data Created Successfully!', 'success');
        return redirect()->route('admin.category.index');
    }//End Method

    /**
     * Show the form for editing the category from storage.
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }//End Method

    /**
     * Update the category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'icon'      =>  ['required', 'not_in:empty'],
            'name'      =>  ['required', 'max:200', 'unique:categories,name,' . $category->id],
            'status'    =>  ['required', 'in:1,0'],
        ]);
        $validated['slug'] =  Str::slug($request->name);

       $category->update($validated);

        toastr('Data Updated Successfully!', 'success');
        return redirect()->route('admin.category.index');
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
        $category = Category::find($request->id);

        // Return error if category not found
        if (!$category) {
            return response(['status' => 'error', 'message' => 'Category not found.'], 404);
        }

        // Ensure the status is either 0 or 1
        if ($request->has('status')) {
            // Convert 'true' or 'false' to 1 or 0
            $status = $request->status == 'true' ? 1 : 0;
            $category->update(['status' => $status]);

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
     * Remove the category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response(['status' => 'success', 'message' => 'Data Delete Successfully!']);
    }//End Method
}
