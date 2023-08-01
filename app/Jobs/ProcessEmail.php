<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $content = array('to'=>'testu1690@gmail.com','cc'=>'testu1690@gmail.com','subject'=>'Test Queue Mail');

        \Mail::raw('test allo', function ($message) use ($content) {

        $message->from("vikas@webnmediasolutions.com", "test");

        $message->to($content['to']);

        if (!empty($content['cc'])) {

        $message->cc($content['cc']);

        }

        $message->subject($content['subject']);
        });
    }
}
