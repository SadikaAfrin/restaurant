<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;


class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();

        Notification::route('mail', $reservation->email)->notify(new ReservationConfirmed());
        Toastr::success('Reservation Request Confirmed Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->back();
    }
}
