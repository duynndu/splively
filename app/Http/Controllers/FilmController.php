<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        return view('clients.film');
    }

    public function films(){
        return view('clients.films');
    }

    public function movieBooking(){
        return view('clients.movie-booking');
    }

    public function seatBooking(){
        return view('clients.seat-booking');
    }

    public function bookingType(){
        return view('clients.booking-type');
    }
    
    public function confirmationScreen(){
        return view('clients.confirmation-screen');
    }
}
