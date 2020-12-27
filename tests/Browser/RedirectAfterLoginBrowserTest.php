<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use English\{Status, User};

class RedirectAfterLoginBrowserTest extends DuskTestCase
{
	/**
	 * Assert that users gets redirected back to status page after login.
	 */
	public function test_authenticated_users_are_redirected_back_to_intended_url()
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
			$browser->assertPathIs('/' . $status->id);
		});
	}
}
