<?php

declare(strict_types=1);

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Remote\{DesiredCapabilities, RemoteWebDriver};

abstract class DuskTestCase extends BaseTestCase
{
	use CreatesApplication;
	use DatabaseMigrations;

	/**
	 * Prepare for Dusk test execution.
	 *
	 * @beforeClass
	 *
	 * @return void
	 */
	public static function prepare()
	{
		static::startChromeDriver();
	}

	/**
	 * Create the RemoteWebDriver instance.
	 *
	 * @return \Facebook\WebDriver\Remote\RemoteWebDriver
	 */
	protected function driver()
	{
		$options = (new ChromeOptions())->addArguments([
			'--disable-gpu',
			'--headless',
		]);

		return RemoteWebDriver::create(
			'http://localhost:9515',
			DesiredCapabilities::chrome()->setCapability(
				ChromeOptions::CAPABILITY,
				$options
			)
		);
	}
}
