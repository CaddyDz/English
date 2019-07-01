<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * Test that we can see the app name on the home page.
     *
     * @return void
     */

    /** @test */
    public function theAppNameIsVisibleOnTheHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('English DZ');
        });
    }
}
