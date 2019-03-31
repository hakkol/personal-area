<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Status;

class StatusesComposer {
    public function __construct()
    {
        $this->statuses = Status::orderBy('id', 'asc')->get();
    }

    public function compose(View $view)
    {
        $view->with('statuses', $this->statuses);
    }
}