<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageBrowserTest extends DuskTestCase
{
    /**
     * Test that we can see the app name on the home page.
     *
     * @return void
     */
    public function test_the_app_name_is_visible_on_homepage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee(config('app.name'));
        });
    }
}
