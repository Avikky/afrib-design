<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\StoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Story;

class AdminController extends Controller
{
   
    public function index()
    {
        return view('admin.dashboard');
    }

    public function category()
    {
        $categories = StoryCategory::latest()->get();
        return view('admin.category', compact('categories'));
    }

    public function location()
    {
        $locations = Location::latest()->get();
        return view('admin.location', compact('locations'));
    }

    public function createCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'sometimes',
        ]); 

        $category = new StoryCategory;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name, '-');

        $category->save();

        return redirect()->back()->with('success', 'Category successfully created!');
    }

    public function createLocation(Request $request)
    {
        $this->validate($request, [
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'sometimes|string',
        ]); 

        $location = new Location;

        $location->country = $request->country;
        $location->city = $request->city;
        $location->state = $request->state;

        $location->save();

        return redirect()->back()->with('success', 'Location successfully created!');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        StoryCategory::destroy($id);

        return redirect()->back()->with('success', 'Deleted successfully!');
    }

    public function deleteLocation($id)
    {
        Location::destroy($id);

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}
