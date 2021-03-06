<?php

use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event',
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});

Route::resource('notifications', 'NotificationController');
/*
class TestEvent implements ShouldBroadcast
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}*/
