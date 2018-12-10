<?php

namespace English\ViewComponents;

use English\Tag;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\View;

class NavbarComponent implements Htmlable
{
    public function toHtml()
    {
        return View::make('layouts.navbar')
            ->with('tags', Tag::all())
            ->render();
    }
}
