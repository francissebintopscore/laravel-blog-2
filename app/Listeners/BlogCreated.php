<?php

namespace App\Listeners;

use App\Events\BlogCreated as EventBlogCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use App\Mail\BlogCreatedEmail;

class BlogCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BlogCreated  $event
     * @return void
     */
    public function handle(EventBlogCreated $event)
    {
        Mail::to('topscoretopscore@gmail.com')->send( new BlogCreatedEmail($event->title));
    }
}
