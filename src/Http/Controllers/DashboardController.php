<?php

namespace Ace\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        // Вказуємо Inertia використовувати наш специфічний шаблон
        Inertia::setRootView('ace-admin::app');

        return Inertia::render('@AceAdmin/Pages/Dashboard', [
            'message' => 'Ласкаво просимо в адмінку!'
        ]);
    }
}
