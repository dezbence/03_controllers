<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{

    public $cars;
    public $origins;

    public function __construct(){
        $this->cars = Storage::json('public\cars.json');

        $this->origins = array_map(function ($car){
            return $car['Origin'];
        },$this->cars['cars']);

        $this->origins = array_unique($this->origins);

        sort($this->origins);

        //dd($this->origins);

    }
    public function index(){
       // dd($cars);
        return view('cars.index',[
            'cars' => $this->cars['cars'],
            'name' => '',
            'origins' => $this->origins,
            'origin2' => 'Europe'
        ]);  // resources\views\cars\index.blade.php
    }

    public function searchByName(Request $request){

        // dd($request->name);

        $filteredCars = []; // üres tömb

        $filteredCars = array_filter($this->cars['cars'], function ($car) use($request) {
            return str_contains($car['Name'], $request->name);
        });

        return view('cars.index',[
            'cars' => $filteredCars,
            'name' => $request->name,
            'origins' => $this->origins,
            'origin2' => 'Europe'
        ]);

    }

    public function searchByOrigin(Request $request){
        //dd($request->origin);

        $filteredCars = array_filter($this->cars['cars'], function ($car) use($request) {
            return $car['Origin'] == $request->origin;
            // str_contains($car['Origin'], $request->origin);
        });

        return view('cars.index',[
            'cars' => $filteredCars,
            'name' => $request->name,
            'origins' => $this->origins,
            'origin2' => $request->origin
        ]);
    }

}
