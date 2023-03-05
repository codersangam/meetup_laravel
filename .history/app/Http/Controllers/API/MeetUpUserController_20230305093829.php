<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetUpUser;

class MeetUpUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = MeetUpUser::all();
        if ($users) {
            return response()->json([
                "status" => 1,
                "message" => "success",
                "meetup-users" => $users,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = $request->validate([
            'full_name' => 'required',
            'email_address' => 'required',
            'phone_number' => 'required',
            'profile_image' => 'required',
            'company_name' => 'required',
            'experienced_years' => 'required',
            'heard_about_us' => 'required',
        ]);

        $data = new MeetUpUser();
        $data->title = $rules['title'];
        $data->slug = $rules['slug'];
        $result = $data->save();

        if ($result) {
            return response()->json([
                "status" => 1,
                "message" => "Tags Added Successfully!!"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Operation Failed!!"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
