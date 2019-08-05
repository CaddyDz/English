<?php

namespace Tests\Browser;

use English\Status;
use English\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RedirectAfterLoginBrowserTest extends DuskTestCase
{
    /**
     * Assert that users gets redirected back to status page after login.
     */

    /** @test */
    public function authenticated_users_are_redirected_back_to_intended_url()
    {
        $user = create(User::class);
        $status = create(Status::class);

        $this->browse(function (Browser $browser) use ($user, $status) {
            $browser->visit('/');
            $browser->clickLink('Read more');
            $browser->visit($status->id);
            $browser->clickLink('Login');
            $browser->visit('/login');
            $browser->type('login', $user->email);
            $browser->type('password', 'secret'); // From user factory
            $browser->press('Login');
            $browser->assertPathIs('/'.$status->id);
        });
    }
}
