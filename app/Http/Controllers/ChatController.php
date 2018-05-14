<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    protected $pusher;
    protected $chatChannel;

    const DEFAULT_CHAT_CHANNEL = 'chat';

    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->chatChannel = self::DEFAULT_CHAT_CHANNEL;
    }

    public function index()
    {
        return view('mensagens.chat', ['chatChannel' => $this->chatChannel]);
    }

    public function postMessage(Request $request)
    {
        $message = [
            'text' => e($request->message),
            'timestamp' => (time()*1000)
        ];

        $this->pusher->trigger($this->chatChannel, 'new-message', $message);
    }
}