<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


class SendMessageController extends Controller
{
    private $target, $token, $routeName;

    public function __construct()
    {
        $this->target = '081290991181';
        $this->token = '#D4j2R3g3Z+7m@eYRv7X';
        $this->routeName = Route::current();
    }

    public function viewkumess()
    {


        return view('formmes');
    }
    public function viewkulok()
    {
        return view('formlok');
    }
    public function viewkupoll()
    {
        return view('formpoll');
    }
    public function viewkubutt()
    {
        return view('formbutt');
    }

    public function sendloc (Request $request){

    }
    public function sendmessage(Request $request)
    {
        // dd($this->token);
        // dd($this->routeName->uri);
        $validasi = $request->validate([
            'pilih' => '',
            'nomor' => 'required',
            'pesan' => '',
            'choices' => '',
            'select' => '',
            'pollname' => '',
            'location' => '',
        ]);

            $response = Http::withHeaders([
                'Authorization' => $this->token,
                'Accept' => 'application/json',
            ])->post('https://api.fonnte.com/send', [
                'target' => $this->routeName->uri==='kirim'||$this->routeName->uri==='kirim/poll'||$this->routeName->uri==='kirim/lok'? $validasi['nomor']: null,
                'message' => $this->routeName->uri==='kirim'||$this->routeName->uri==='kirim/poll'? $validasi['pesan']:null,
                'choices' => $this->routeName->uri==='kirim/poll'?$validasi['choices']:null,
                'select' => $this->routeName->uri==='kirim/poll'?$validasi['select']:null,
                'location' => $this->routeName->uri==='kirim/lok'?'-6.329680, 106.972360':null
                // 'pollname' => 'list-2'
            ]);
        // }

        return response($response);
    }
    public function teswebhook()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $device = $data['device'];
        $sender = $data['sender'];
        $message = $data['message'];
        $text = $data['text']; //button text
        $member = $data['member']; //group member who send the message
        $name = $data['name'];
        $location = $data['location'];
        $pollname = $data['pollname'];
        $choices = $data['choices'];

        //data below will only received by device with all feature package
        //start
        $url =  $data['url'];
        $filename =  $data['filename'];
        $extension =  $data['extension'];

        if ($message == "test") {
            $reply = [
                "message" => "working great!",
            ];
        } elseif ($message == "image") {
            $reply = [
                "message" => "image message",
                "url" => "https://filesamples.com/samples/image/jpg/sample_640%C3%97426.jpg",
            ];
        } elseif ($message == "audio") {
            $reply = [
                "message" => "audio message",
                "url" => "https://filesamples.com/samples/audio/mp3/sample3.mp3",
                "filename" => "music",
            ];
        } elseif ($message == "video") {
            $reply = [
                "message" => "video message",
                "url" => "https://filesamples.com/samples/video/mp4/sample_640x360.mp4",
            ];
        } elseif ($message == "file") {
            $reply = [
                "message" => "file message",
                "url" => "https://filesamples.com/samples/document/docx/sample3.docx",
                "filename" => "document",
            ];
        } else {
            $reply = [
                "message" => "Sorry, i don't understand. Please use one of the following keyword :

Test
Audio
Video
Image
File",
            ];
        }
    }
}
