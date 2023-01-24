<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;
class OperatorController extends Controller
{
    public function index(){
        $persons = Person::latest()->paginate(4);
        $personCount = Person::count('id');
        $viewersCount =User::where('role','data_viewer')->count();
        $operatorsCount =User::where('role','data_entry')->count();

        return view('operator.dashboard',compact(['persons','personCount','viewersCount','operatorsCount']));
    }

    public function dataForm(){
      return view('operator.addForm');
    }
    //store data
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'nic' => 'required|unique:persons|min:10|max:10',
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

    //edit form
    public function edit($id)
    {
        $person = Person::find($id);
        return view('operator.edit', compact('person'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'nic' => 'required|min:10|max:10',
            'dob'=>'required',
            'age'=>'required|max:3',
            'address'=>'required',
            'contact'=>'required|digits:10',
            'religion'=>'required',
        ]);

        $person = Person::find($id);
        $person->name = $request->input('name');
        $person->nic = $request->input('nic');
        $person->dob = $request->input('dob');
        $person->age = $request->input('age');
        $person->address = $request->input('address');
        $person->contact = $request->input('contact');
        $person->religion = $request->input('religion');
        $person->nationality = $request->input('nationality');
        $person->update();
        // return redirect()->back()->with('status','Student Updated Successfully');

        // $person->update($request->all());
        return redirect()->route('operator.dashboard')
                        ->with('message','Person updated successfully.');
    }

    //delete
    public function destroy(Request $request)

    {
        Person::where('id', $request->id)->delete();
        return redirect()->route('operator.dashboard')
                        ->with('message','Person deleted successfully.');
    }

    //show by row
    public function show( $id)
    {
        $person = Person::find($id);
        return view('layouts.view',compact('person'));
    }


}
