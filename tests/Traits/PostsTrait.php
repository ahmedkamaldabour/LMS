<?php

namespace Tests\Traits;

use App\Models\Post;

trait PostsTrait
{
    public function storePost()
    {
        return Post::factory()->create();
    }
}
