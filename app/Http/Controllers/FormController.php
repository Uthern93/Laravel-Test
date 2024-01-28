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
       // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:active_users,email',
        'password' => 'required|min:8',
        'Gender' => 'required|in:Male,Female',
        'birthday' => 'required|date',
        'status' => 'required|in:Yes,No',
    ]);


    try {
        $activeUsers = new ActiveUser();

        // Assign values directly, no need to use request() function
        $activeUsers->name = $request->input('name');
        $activeUsers->email = $request->input('email');
        $activeUsers->password = $request->input('password');
        $activeUsers->gender = $request->input('Gender');
        $activeUsers->birthday = $request->input('birthday');
        $activeUsers->status = $request->input('status');
        $activeUsers->created_at = now();

        $activeUsers->save();

        return redirect('/')->with('msg', 'Your data has successfully submitted !');
        
    } catch (\Exception $e) {

        return redirect()->route('form')->with('err', 'An error occurred while saving your data.');
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

