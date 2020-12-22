<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the Employees.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users-list', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        /**
         * @todo Redirect to the form to add emplyee to the system
         */
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
      /**
       * @todo Add emplyee to the system
       */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('employee_info', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('auth.register', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return View|Factory
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/',
            'email' => 'required|string|email|max:255',
            'phno' => 'required|numeric',
            'designation' => 'string',
            'salary' => 'numeric',
        ]);
        
        $user = User::find($id);;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phno = $request->input('phno');
        $user->designation = $request->input('designation');
        $user->salary = $request->input('salary');
    
        $user->save();

        return redirect(route('list.users'))->with('success','Write here your messege');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int|false
     */
    public function destroy($id)
    {
        return User::find($id)->delete();
    }

    /**
     * @return Response
     */
    public function download()
    {
        $csvHeader = $this->setFileHeader();

        $users = User::all()->toArray();

        array_unshift($users, array_keys($users[0]));

        $callback = function() use ($users) 
        {
            $FH = fopen('php://output', 'w');
            foreach ($users as $user) { 
                fputcsv($FH, $user);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $csvHeader);
    }

     /**
     * @return array
     */
    private function setFileHeader()
    {
        return [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=EmployeeeData.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];
    }
}
