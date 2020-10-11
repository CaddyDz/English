<?php

declare(strict_types=1);

namespace English\ViewComponents;

use English\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class NavbarComponent implements Htmlable
{
	public function toHtml()
	{
		return View::make('layouts.navbar')
			->with('tags', Tag::all())
			->render();
	}
}
