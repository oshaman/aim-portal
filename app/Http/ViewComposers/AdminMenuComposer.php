<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 20.09.2018
 * Time: 16:56
 */

namespace App\Http\ViewComposers;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\View\View;

class AdminMenuComposer
{
    public function compose(View $view): void
    {
        $view->with('navigation', AdminController::getMenu());
    }

}