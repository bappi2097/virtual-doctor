<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chat;
use Exception;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Appointment $appointment)
    {
        try {
            $user = auth()->user();

            $this->validate($request, [
                'chat' => 'required|string',
            ]);

            $chat = new Chat();

            $chat->text = $request->chat;
            if ($user->hasRole('doctor')) {
                $chat->doctor_id = $user->id;
                $chat->patient_id = $appointment->patient_id;
                $chat->doctor_category_id = $appointment->doctor_category_id;
                $chat->appointment_id = $appointment->id;
                $chat->type = "doctor";
            } else {
                $chat->patient_id = $user->id;
                $chat->doctor_id = $appointment->doctor_id;
                $chat->doctor_category_id = $appointment->doctor_category_id;
                $chat->appointment_id = $appointment->id;
                $chat->type = "patient";
            }
            $chat->save();
            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
