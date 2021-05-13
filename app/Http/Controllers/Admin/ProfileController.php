<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('admin.my-pages.profile', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "user_name" => "required|string|unique:users,user_name," . $user->id,
            "phone_no" => "required|string|max:25",
            "image" => "nullable|file",
            "address" => "required|string",
        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "user_name" => $request->user_name,
            "address" => $request->address,
        ];

        if ($request->hasFile('image')) {
            if (Storage::disk("local")->exists($user->image)) {
                Storage::disk("local")->delete($user->image);
            }
            $data['image'] = Storage::disk("local")->put("images\\admins", $request->image);
        }

        if ($user->update($data)) {
            Toastr::success('Successfully Profile Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            "password" => "required|string|min:8|max:25|confirmed",
        ]);
        $data = [
            "password" => bcrypt($request->password),
        ];

        if ($user->update($data)) {
            Toastr::success('Successfully Password Changed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}
