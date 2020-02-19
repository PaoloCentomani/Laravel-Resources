<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\SupportStored;
use Illuminate\Support\Facades\Mail;

class SupportTest extends TestCase
{
    /**
     * A support e-mail is sent.
     *
     * @return void
     */
    public function testASupportEmailIsSent()
    {
        Mail::fake();

        $this->post(route('support.store'), [
            'email' => 'email@example.com',
            'message' => 'Lorem ipsum dolor sit amet.',
            'name' => 'Lorem Ipsum',
        ]);

        Mail::assertSent(SupportStored::class);
    }
}
