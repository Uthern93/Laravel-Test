<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ActiveUser represent table from database
use App\Models\ActiveUser;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    
    // Controller for table function to route to home view
    public function home()
    {
        return view('home');
    }

    // Controller for table function to route to table view
    public function table() 
    {   
        // Creating a ActiveUsers variable to use a ActiveUser Model which represents database's data and retrieve all the database data
        // $ActiveUsers=ActiveUser::all();

        // Creating a new ActiveUsers variable to use a ActiveUser Model which represents database's data and get the database data with condition
        $ActiveUsers=ActiveUser::where('status','Yes')->get();
        // return to view 'table' and passing data to an Array which contain 'ActiveUsers' variable that store data from $ActiveUsers variable above
        return view('table', ['ActiveUsers'=>$ActiveUsers]);
    }

    // Controller for table function to route to form view
    public function form() 
    {
        return view('form');
    }

    //Controller function to store data to database
    public function store(Request $request) 
    {
        DB::beginTransaction();

    try {
        $ActiveUsers=new ActiveUser();
        
        $Email = $request->input('Email');
        if (ActiveUser::where('email', $Email)->exists())
        {
            return redirect()->route('form')->with('err', 'Your email has already been used!');
        } else {

        // request data from an input item 
        // the naming for it have to be the same as column name for the table
        $ActiveUsers->name=request('name');
        $ActiveUsers->email=request('email');
        $ActiveUsers->password=request('password');
        $ActiveUsers->gender=request('Gender');
        $ActiveUsers->birthday=request('birthday');
        $ActiveUsers->status=request('status');
        $ActiveUsers->created_at=now();

        $ActiveUsers->save();

        return redirect('/')->with('msg', 'Your data has successfully submitted !');
        }

        DB::commit();

        return redirect()->route('home')->with('msg', 'Your data has been successfully submitted!');

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()->route('form')->with('err', 'Your email has already been used!');
    }
        
    }

    //Controller function to remove data from database
    public function remove($id) 
    {   
        // It is important to name the variable for the models as it will be the same name as our table name
        // Using the model to find a record in our table
        $ActiveUsers=ActiveUser::findOrFail($id);
        // Delete records from table database
        $ActiveUsers->delete();

        return redirect('/table')->with('del', 'Data Deleted Successfully !');
    }

}

