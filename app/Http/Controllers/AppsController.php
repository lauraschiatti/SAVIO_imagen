<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apps;
use Illuminate\Support\Facades\Redirect;


class AppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apps = Apps::all();

        if($apps->isEmpty()){
            $apps = null;
        }

        return view('apps.index',compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /*$error = 'hola';

        if (session()->has('users')) {
            $error = session('error');
        }*/

        return view('apps.create');//, compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $error = null;

        if ($request->isMethod('post')) {
            $name = $request->input('name');

            $app = Apps::where("name", "=" ,$name)->first();

            if(!$app){
                $newApp = new Apps();
                $newApp->name = $name;
                $newApp->hash = self::generateHash(24);
                $newApp->save();

                return redirect('apps');

            }else{
                return redirect('apps/create');
                //Redirect::back()->with('message', 'message|Record updated.');
            }
        }else{
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $app = Apps::find($id);

        if($app){
            return view('apps.edit',compact('app'));
        }else{
            return view('errors.404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $app = Apps::find($id);
            $name = $request->input('name');
            
            if($app) {
                $app->name = $name;

                $app->save();
            }

            return redirect('/apps');

        }else{
            abort(405);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $app = Apps::find($id)->delete();

        return redirect('apps');

    }

    function generateHash($len){
        //String
        $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

        //String length
        $string_length = strlen($string);

        //hash var
        $hash = "";

        //Define hash length
        $hash_length = $len;

        for($i = 1 ; $i <= $hash_length ; $i++){
            //Random number between 0 and the string_length-1
            $pos=rand(0, $string_length-1);

            //In each iteration, add a char correspondent to $pos position in the $string to the hash string randomly
            $hash .= substr($string, $pos ,1);
        }

        $app = Apps::where('hash', '=', $hash)->first();

        if($app){
            self::generateHash(24);
        }else{
            return $hash;
        }
    }
}
