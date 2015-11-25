<?php

namespace App\Handlers\Events;

use App\Events\SendSMSEvent;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMS implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the event.
     *
     * @param  SendSMSEvent  $event
     * @return void
     */
    public function handle(SendSMSEvent $event)
    {
        var_dump("Event fired");

        $data = $event->getData();

        $courier = $event->getCourier();
        $courier->sendTextMessage([
            'to'      => $data['phone'],
            'message' => $data['message'],
        ]);

        $user = $this->users->find($data['user']['id']);
        $user->messages()->create([
            'to'      => $data['phone'],
            'message' => $data['message'],
        ]);
    }
}
