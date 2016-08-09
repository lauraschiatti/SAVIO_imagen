<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apps;

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
        return view('apps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
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
                return $app;

                return redirect('apps/create');//->with('error', 'error');
            }
        }else{
            abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*$sensor = Sensors::where("id", "=", $id)->first();

        if($sensor) {
            return view('sensors.show', compact('sensor'));
        }else{
            abort(404);
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sensor = Sensors::where("id", "=", $id)->first();

        if($sensor){
            return view('sensors.edit',compact('sensor'));
        }else{
            return abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $unit =  trim(Input::get('unit'));
        $type = trim(Input::get('type'));

        $sensor = Sensors::where("type", "=", $type)
            ->Where("unit", "=", $unit)
            ->Where("id", "!=", $id)
            ->first();

        if($sensor == null){
            Sensors::where('id', '=', $id)->update(['type' => $type, 'unit' => $unit]);
            return redirect('sensors');
        }else{
            return redirect()->back()->with('error', ' TYPE-UNIT COMBINATION ALREADY EXISTS');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Sensors::find($id)->delete();
        return redirect('sensors');
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
