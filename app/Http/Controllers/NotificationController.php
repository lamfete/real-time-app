<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// TODO: Get Pusher instance from service container
use Illuminate\Support\Facades\App;

class NotificationController extends Controller
{
    public function index() {
        return view('notification');
    }

    public function store(Request $request) {
        $notifyText = e($request->input('notify_text'));

        // TODO: Get Pusher instance from service container
        $pusher = App::make('pusher');

        $pusher->trigger( 'notifications-channel',
                          'new-notification', // TODO: On the 'notifications' channel trigger a 'new-notification' event
                          array('text' => $notifyText)); // TODO: The notification event data should have a property named 'text'
    }
}
