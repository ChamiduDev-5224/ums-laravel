<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ViewerController extends Controller

{
       //authentication
    public function __construct()
        {
         $this->middleware('auth');
        }

      //viewer-dashboard
    public function index(){
        $persons = Person::latest()->paginate(4);
        $personCount = Person::count('id');
        $viewersCount =User::where('role','data_viewer')->count();
        $operatorsCount =User::where('role','data_entry')->count();
        return view('viewer.dashboard',compact(['persons','personCount','viewersCount','operatorsCount']));
    }

    //charts
    public function show(){
        $personCount = Person::count('id');
        $viewersCount =User::where('role','data_viewer')->count();
        $operatorsCount =User::where('role','data_entry')->count();

        $dates = collect();
        foreach( range( -6, 0 ) AS $i ) {
            $date = Carbon::now()->addDays( $i )->format( 'Y-m-d' );
            $dates->put( $date, 0);
        }

        // Get the post counts
        $persons = Person::where( 'created_at', '>=', $dates->keys()->first() )
                     ->groupBy( 'date' )
                     ->orderBy( 'date' )
                     ->get( [
                         DB::raw( 'DATE( created_at ) as date' ),
                         DB::raw( 'COUNT( * ) as "count"' )
                     ] )
                     ->pluck( 'count', 'date' );

        // Merge the two collections;
        $dates = $dates->merge( $persons );

        return view('layouts.chart',compact(['personCount','viewersCount','operatorsCount','dates']));
    }

}

