<?php

declare(strict_types=1);

namespace English\Providers;

use English\Tag;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('*', function ($view) {
			$view->with('tags', Tag::all());
		});
		Blade::directive('render', function ($component) {
			return "<?php echo (app($component))->toHtml(); ?>";
		});
	}
}
