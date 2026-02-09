<?php

namespace Ace\Admin\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Поки що просто повернемо текст, щоб перевірити зв'язок
        return "Вітаємо в Ace Admin Panel! Пакет працює.";
    }
}
