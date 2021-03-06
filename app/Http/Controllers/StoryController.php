<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoryCategory;
use App\Models\Story;
use App\Models\Location;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

 
class StoryController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        if(Auth::user()->role == 1){

            $stories =  DB::table('stories')->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
            ->join('locations', 'stories.location_id', '=', 'locations.id')
            ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();
    
            $locations = Location::latest()->get();
            $categories = StoryCategory::latest()->get();

        }else{
            $stories =  DB::table('stories')->where('user_id', Auth::id())->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
            ->join('locations', 'stories.location_id', '=', 'locations.id')
            ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->get();
    
            $locations = Location::latest()->get();
            $categories = StoryCategory::latest()->get();
        }


        // return $stories;

        return view('account.stories', compact('stories', 'locations', 'categories'));
        
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'category' => 'required|integer',
            'location' => 'required|integer',
            'is_draft' => 'required|integer',
            'story' => 'required|string',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

        $story = new Story;

        $story->title = $request->title;
        $story->category_id = $request->category;
        $story->location_id = $request->location;
        $story->user_id = Auth::id();
        // $story->is_draft = $request->draft;
        $story->story = $request->story;
        $story->slug = Str::slug($request->title, '-');


        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
           
            if(env('APP_ENV') == 'local'){
                $storeImg = Storage::disk('public')->putFile('story_images', $file);
                $image = 'storage/'.$storeImg;
            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $image = $image_url;
            }
        } 
        else{
            $image = NULL;
        }

        $story->image = $image;

        $story->save();


        return redirect()->back()->with('success', 'Story successful created!');
    }
    
    public function show($slug)
    {
        $id = Story::where('slug', $slug)->first();
        $story = DB::table('stories')
        ->join('story_categories', 'stories.category_id', '=', 'story_categories.id')
        ->join('locations', 'stories.location_id', '=', 'locations.id')
        ->where('stories.id', $id->id)
        ->select('stories.*', 'story_categories.name as cat_name', 'locations.country as loca_country', 'locations.city as loca_city', 'locations.state as loca_state')->first();

        $categories  = StoryCategory::latest()->get();
      
        
        return view('account.preview', compact('story', 'categories'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'category' => 'required|integer',
            'location' => 'required|integer',
            'is_draft' => 'required|integer',
            'story' => 'required|string',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

        $story = Story::find($id);

        $story->title = $request->title;
        $story->category_id = $request->category;
        $story->location_id = $request->location;
        // $story->status = 0;
        // $story->is_draft = $request->draft;
        $story->story = $request->story;
        $story->slug = Str::slug($request->title, '-');

        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
            if(env('APP_ENV') == 'local'){
                $storeImg = Storage::disk('public')->putFile('story_images', $file);
                $image = 'storage/'.$storeImg;
            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $image = $image_url;
            }
        } 
        else{
            $image = $story->image;
        }

        $story->image = $image;

        $story->save();

        return redirect()->back()->with('success', 'Story updated successfully!');
    }


    public function destroy($id)
    {
        Story::destroy($id);
        return redirect()->back()->with('success', 'Story deleted!');
    }

    public function approveStory(Request $request, $id)
    {
       if($request->has('approve')){
           $story = Story::find($id);
           $story->status = 1;
           $story->save();
        }

       return redirect()->back()->with('success', 'Story approved !');
    }

    public function rejectStory(Request $request, $id)
    {
        if($request->has('reject')){
            $story = Story::find($id);
            $story->status = 2;
            $story->save();
        }

        return redirect()->back()->with('success', 'Story rejected!');
    }
}
