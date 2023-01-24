<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;
class ViewerController extends Controller
{
    public function index(){
        $persons = Person::latest()->paginate(4);
        $personCount = Person::count('id');
        $viewersCount =User::where('role','data_viewer')->count();
        $operatorsCount =User::where('role','data_entry')->count();
        return view('viewer.dashboard',compact(['persons','personCount','viewersCount','operatorsCount']));
    }
}

