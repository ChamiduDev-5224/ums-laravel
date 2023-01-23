<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class OperatorController extends Controller
{
    public function index(){
        $persons = Person::latest()->paginate(4);
        return view('operator.dashboard',compact('persons'));
    }

    public function dataForm(){
      return view('operator.addForm');
    }
    //store data
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'nic' => 'unique:persons',
            'dob'=>'required',
            'age'=>'required|max:3',
            'address'=>'required',
            'contact'=>'required|digits:10',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
            'religion'=>'required',


        ]);
        $image_path = $request->file('image')->store('image', 'public');

        $newPerson = new Person();
        $newPerson->name = $request->name;
        $newPerson->nic = $request->nic;
        $newPerson->dob = $request->dob;
        $newPerson->age = $request->age;
        $newPerson->address = $request->address;
        $newPerson->contact = $request->contact;
        $newPerson->image = $image_path;
        $newPerson->religion = $request->religion;
        $newPerson->nationality = $request->nationality;

        $newPerson->save();

        return redirect('/operator-dashboard')
            ->with('message', 'New person Added Successfully');


    }
    //delete
    public function destroy(Request $request)

    {
        Person::where('id', $request->id)->delete();
        return redirect()->route('operator.dashboard')
                        ->with('message','Person deleted successfully.');
    }

}
