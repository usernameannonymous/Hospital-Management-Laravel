<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $doctors = Doctor::all();
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));
        }
    }

    public function appointment(Request $request)
    {
        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = "In Progress";

        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back();
    }

    public function myappointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appointments = Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appointments'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }
}
