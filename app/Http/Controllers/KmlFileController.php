<?php

namespace App\Http\Controllers;

use App\Models\KmlFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KmlFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kml-file.create');
    }
    public function store(Request $request)
    {
        $request->validate([
               'kmlFile' => 'required|file'
        ]);

        if (!$request->hasFile('kmlFile'))
            return redirect()->back()->withErrors('No KML file was uploaded.');
        $kmlFile = $request->file('kmlFile');
        if (!simplexml_load_file($kmlFile) )
             return redirect()->back()->withErrors('Invalid KML format.');
        if (!$kmlFile->getClientOriginalExtension() == 'kml')
            return redirect()->back()->withErrors('The kml file field must be a file of type: kml.');

        $userId = Auth::id();
        $fileName = 'uploaded_kml.' . $kmlFile->getClientOriginalExtension();
        $kmlFile->move(public_path('uploads/'.$userId.'/'), $fileName);
        $kmlFilePath = storage_path('uploads/'.$userId.'/' .$fileName);
        KmlFile::query()->updateOrCreate([
            'user_id'=>$userId
        ],[
            'name' =>$fileName,
            'path'=>env('APP_URL').'/uploads/'.$userId.'/' .$fileName
        ]);

        return redirect()->back()->with(['message' => 'KML file uploaded Successfully.']);


    }
}
