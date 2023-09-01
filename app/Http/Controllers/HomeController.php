<?php

namespace App\Http\Controllers;

use App\Models\KmlFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Google cannot access the local server, therefore until the code is online, kml won't display.
        if (env('APP_ENV') == 'local')
            $kmlUrl = 'https://googlearchive.github.io/js-v2-samples/ggeoxml/cta.kml';
        else
        {
            $userFile = KmlFile::query()->where('user_id',Auth::id())->first();
            if ($userFile)
                $kmlUrl = $userFile->path;
            else
                $kmlUrl = 'https://googlearchive.github.io/js-v2-samples/ggeoxml/cta.kml';
        }
        $googleApiKey = env('GOOGLE_API_KEY');
        return view('home')->with([
            'kmlUrl'=>$kmlUrl,
            'googleApiKey' =>$googleApiKey
        ]);
    }
}
