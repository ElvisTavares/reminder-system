<?php

namespace App\Http\Controllers\Reminder;

use App\Http\Controllers\Controller;
use App\Mail\ReminderCreated;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //opção para salvar 1
        // $dataReminder = [
        //     'name' => $request->nameReminder,
        //     'descReminder' => $request->descReminder,
        // ];

        // Reminder::create($dataReminder);
        //opção para salvar 1

        //opção 2
        $reminder = new Reminder;
        $reminder->name = $request->nameReminder;
        $reminder->descReminder = $request->descReminder;
        $reminder->save();
        //opção 2
        
        $user = Auth::user();
        $email = new ReminderCreated($reminder->name);
        Mail::to($user)->send($email);
        sleep(2);

        
        return 'Save';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
