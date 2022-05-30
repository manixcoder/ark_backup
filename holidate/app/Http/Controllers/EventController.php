<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('holidates_web.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(),[
            'heading' => 'required',
            'description' => 'required',
            'buy_link' => 'required',
            'location' => 'required',
            'online_booking_fee' => 'required',
            'event_start_time' => 'required',
            'event_end_time' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ])->validate();
        $event = New Event();
        $event->user_id = Auth::User()->id;
        $event->heading = $request->input('heading');
        $event->description = $request->input('description');
        $event->image = $request->input('image');
        $event->buy_link = $request->input('buy_link');
        $event->location = $request->input('location');
        $event->online_booking_fee = $request->input('online_booking_fee');
        $event->event_start_time = $request->input('event_start_time');
        $event->event_end_time = $request->input('event_end_time');
        $event->longitude = $request->input('longitude');
        $event->latitude = $request->input('latitude');
        $event->save();
        return redirect(route('user.profile'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
