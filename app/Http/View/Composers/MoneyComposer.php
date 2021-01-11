<?php

namespace App\Http\View\Composers;


use App\Models\Money;
use Illuminate\View\View;

class MoneyComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('money', Money::latest()->first());
    }
}
