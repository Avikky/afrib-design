<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('account.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($id);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            if(env('APP_ENV') == 'local'){
                $storeImg = Storage::disk('public')->putFile('profile', $file);
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
            $image = $user->image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $image;

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');

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
    public function destroy($id)
    {
        //
    }
}
