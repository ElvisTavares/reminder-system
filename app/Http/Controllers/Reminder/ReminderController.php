<?php

namespace App\Http\Controllers\Reminder;

use App\Events\EventsReminderCreated;
use App\Http\Controllers\Controller;
use App\Mail\ReminderCreated;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ReminderRequest;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::all();
        
        return view('reminder.index')->with('reminders', $reminders);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReminderRequest $request)
    {
 
        //opção para salvar 1
        // $dataReminder = [
        //     'name' => $request->nameReminder,
        //     'descReminder' => $request->descReminder,
        // ];

        // Reminder::create($dataReminder);
        //opção para salvar 1

        //opção 2

        $coverPath = $request->file('cover')->store('reminder_cover', 'public');
        
        $reminder = new Reminder;
       
        $reminder->name = $request->nameReminder;
        $reminder->descReminder = $request->descReminder;
        $reminder->cover = $coverPath;
        $reminder->save();
        //opção 2
        
        $user = Auth::user();
        // $email = new ReminderCreated($reminder->name);
        //Mail::to($user)->send($email);

        //como envia o lembrete criado para um usuario, aqui pode ser assim
        //Mail::to($user)->queue($email);

        //  <-------->
        //se fosse enviado email a varios usuarios quando criar o lembrete, seria interessande criar assim
        //no caso vai enviar um email a cada 5 segundos
        // $when = now()->addSeconds(5);
        // Mail::to($user)->later($when,$email);
        // sleep(2);
         //  <-------->

         EventsReminderCreated::dispatch(
            $reminder->name,
            $reminder->descReminder,
         );
        

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
