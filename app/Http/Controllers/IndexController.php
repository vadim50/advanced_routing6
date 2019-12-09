<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Photo;
use Validator;

class IndexController extends Controller
{
    //
 

    public function enter(){

    	$places = Place::all();

    	return view(env('THEME').'.layouts.site')->with('places',$places);
    }

    public function index(){

    	// $this->getMenu();

    	$places = Place::all();


    	return view(env('THEME').'.index')->with('places',$places);

    }

    public function show($id){
    	$places = Place::all();

    	$place = Place::find($id);

    	return view(env('THEME').'.place')->with(['place'=>$place,'places'=>$places]);
    }

    public function create(){

    	$places = Place::all();

    	return view(env('THEME').'.add_place')->with('places',$places);

    }

    public function store(Request $request){

    	if($request->isMethod('post')){

    		$input = $request->except('_token');

    		$messages = [

    			'required' => 'Поле :attribute обязательно к заполнению',
    			'unique' => 'Поле :attribute Должно быть уникальным'

    		];

    		$validator = Validator::make($input,[

    			'name'=>'required|unique:places',
    			'desc'=>'required',
    			'type'=>'required'

    		],$messages);

    		if($validator->fails()){

    			return back()->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('image')){
    			$file = $request->image;

    			$input['image'] = $request->file('image')->getClientOriginalName();

    			$file->move(public_path().'/assets/img/',$input['image']);
    		}

    		$place = new Place;

    		$place->fill($input);

    		if($place->save()){
    			$places = Place::all();

    			return view(env('THEME').'.index')->with('places',$places);
    		}

    	}
    	abort(404);
    }
    public function edit($id){

    	$place = Place::find($id);

    	return view(env('THEME').'.edit_place')->with('place',$place);
    }

    public function add(Request $request){

        if($request->isMethod('post')){
            $res = $request->except('_token');

            $messages = [

                'required'=>'Выберите изображение!'

            ];

            $validator = Validator::make($res,['image'=>'required'],$messages);

            if($validator->fails()){

                return back()->withErrors($validator)->withInput();
             }
          
            if($request->hasFile('image')){
                $file = $request->image;

                $input = $request->file('image')->getClientOriginalName();

                $file->move(public_path().'/assets/img/',$input);
            

            $place = Place::find($request->id);

            $photo = new Photo(['link'=>$input]);

            if($place->photos()->save($photo)){
                //dd(Photo::all());

                return redirect()->route('places.show',['id'=>$request->id]);
            }
            }

        }
        abort(404);
    }
}
