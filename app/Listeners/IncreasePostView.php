<?php

namespace App\Listeners;

use App\Events\PostView;

class IncreasePostView
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
     * @param object $event
     * @return void
     */
    public function handle(PostView $event)
    {
        $post = $event->post;
        $ip = $event->ip;
        if ($post->views()->where('ip_address', $ip)->count() > 0) {
            return $post->view_count;
        }
        else {
            $post->views()->firstOrCreate([
                'ip_address' => $ip,
            ]);
        }
        $post->view_count += 1;
        $post->save();
        return $post->view_count;
    }
}
