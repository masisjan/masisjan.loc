<?php

namespace App\Http\View\Composers;


use App\Models\Word;
use Illuminate\View\View;

class WordComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('words', Word::all());
    }
}
