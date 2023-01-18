<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index (){
        return view('dashboard.profile.index');
    }
    function update(Request $request){
        $request->validate(
            [
                '_photo' => 'mimes:jpeg,jpg,png,gif',
                '_email' => 'required|email'
            ],
            [
                '_photo.mimes' => 'Image Extension: jpeg,jpg,png,gif',
                '_email.required' => 'Insert Email',
                '_email.email' => 'Email Format not Valid'
            ]
        );
        if ($request->hasFile('_photo')) {
            $photo_file = $request->file('_photo');
            $photo_extensions = $photo_file->extension();
            $photo_new = date('ymdhis') . ".$photo_extensions";
            $photo_file->move(public_path('photo'), $photo_new);
            // if any update photo
            $photo_old = get_meta_value('_photo');
            File::delete(public_path('photo')."/".$photo_old);

            metadata::updateOrCreate(['meta_key' => '_photo'], ['meta_value' => $photo_new]);
        }
        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        metadata::updateOrCreate(['meta_key' => '_phonenumber'], ['meta_value' => $request->_phonenumber]);
        
        metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        metadata::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
        metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->linkedini]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);

        return redirect()->route('profile.index')->with('success', 'Succes Update Data');
    }
}
