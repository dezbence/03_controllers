<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PageController extends Controller
{
    public function index(){
       // echo 'OK';

       return view('home');
    }

    public function passingData(){
        $title = 'Adatok átadása';
        $subTitle = 'A kontrollerben lévő változók átadása a sablonnak';
        $fruits = array('Alma','Körte','Barack','Szilva');

        // asszociatív tömb
        $ages = array('Béla'=>26,'Jószi'=>31,'Zoli'=>40,'Kata'=>23);

        // több dimenziós tömb
        $cars = array(
            array("Name"=>"Volvo","Model"=>"GH-234","Grade"=>5),
            array("Name"=>"BMW","Model"=>"PAJD-231","Grade"=>4),
            array("Name"=>"Saab","Model"=>"OWED-7554","Grade"=>3.5
                    ,'Parts'=>array('light','engine','wheel')
                ),
            array("Name"=>"Land Rover","Model"=>"LDKS-01454","Grade"=>4.5)
            );
// ,'Parts'=>array('light','engine','wheel')
            //dd($cars);

        // object array
        $people = array(
            new People("Béla",32,"Győr"),
            new People("Józsi",40,"Sopron"),
            new People("Kata",20,"Komárom"),
        );

        //dd($people);

        return view('simplevariable',[
            'title' => $title,
            'subTitle' => $subTitle,
            'fruits' => $fruits,
            'ages' => $ages,
            'cars' => $cars,
            'people' => $people
        ]);
    }
}
