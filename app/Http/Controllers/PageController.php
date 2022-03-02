<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\Location;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{


    public function index()
    {
        
        $stories =  DB::table('stories')->where('status', 1)->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
        ->join('locations', 'stories.location_id', '=', 'locations.id')
        ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();

        $locations = Location::latest()->get();
        $categories = StoryCategory::latest()->get();
        
        return view('index', compact('stories', 'locations', 'categories'));
    } 

    public function viewStory($slug)
    {
        $id = Story::where('slug', $slug)->first();
        $story = DB::table('stories')
        ->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
        ->join('locations', 'stories.location_id', '=', 'locations.id')
        ->where('stories.id', $id->id)
        ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->first();

        $categories  = StoryCategory::latest()->get();
        $locations = Location::latest()->get();
      
        
        return view('viewstory', compact('story', 'categories', 'locations'));
    }

   
    public function allstory(Request $request)
    {
        if($request->has('category')){
            $stories =  DB::table('stories')->where('category_id', $request->category)->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
            ->join('locations', 'stories.location_id', '=', 'locations.id')
            ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();
        }elseif($request->has('location')){
            $stories =  DB::table('stories')->where('location_id', $request->location)->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
            ->join('locations', 'stories.location_id', '=', 'locations.id')
            ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();
        }else{
            $stories =  DB::table('stories')->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
            ->join('locations', 'stories.location_id', '=', 'locations.id')
            ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();
        }
       

        $locations = Location::latest()->get();
        $categories = StoryCategory::latest()->get();
        
        return view('allstory', compact('stories', 'locations', 'categories'));
    }


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
    public function destroy($id)
    {
        //
    }
}
