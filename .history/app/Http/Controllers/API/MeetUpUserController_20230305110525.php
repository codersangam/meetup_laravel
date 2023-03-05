<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetUpUser;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'email_address' => 'required|unique:meet_up_users,email_address,except,id',
            'phone_number' => 'required|unique:meet_up_users,phone_number,except,id',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($request->hasFile('profile_image')) {
            $profile_image = $request->profile_image->store('public/profile_image');
        }

        $data = new MeetUpUser();
        $data->full_name = $rules['full_name'];
        $data->email_address = $rules['email_address'];
        $data->phone_number = $rules['phone_number'];
        $data->profile_image = $rules['profile_image'];
        $data->profile_image = $profile_image;
        $data->company_name = $rules['company_name'];
        $data->experienced_years = $rules['experienced_years'];
        $data->heard_about_us = $rules['heard_about_us'];
        $result = $data->save();

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return response()->json([
                "status" => 1,
                "message" => "Thank you for submitting form for an event/meetup!!"
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
