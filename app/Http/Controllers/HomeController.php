<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Item;
use App\Models\Reservation;



class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }

    public function reserve(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'person' => 'required',
            'message' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->person = $request->person;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Reservation Request Sent Successfully. We will confirm you soon', 'Success', ["positionClass" => "toast-top-right"]);



        return redirect()->back();
    }
}
