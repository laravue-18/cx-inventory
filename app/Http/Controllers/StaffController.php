<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $rows = Staff::where('id', '<>', auth()->id())->get();
        return view('user.staffs.index')->with(compact('rows'));
    }

    public function create()
    {
        return view('user.staffs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        $data['status'] = $request['status'] ? true : false;

        Staff::create($data);
        return redirect('/user/staffs')->with('message', 'New Staff has been added!');
    }

    public function show(Staff $staff)
    {
        //
    }

    public function edit(Staff $staff)
    {
        return view('user.staffs.edit')->with(compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        $data['status'] = $request['status'] ? true : false;

        $staff->update($data);
        return redirect('/user/staffs')->with('message', 'This Staff has been updated!');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect('/user/staffs')->with('message', 'The Staff has been deleted!');
    }
}
