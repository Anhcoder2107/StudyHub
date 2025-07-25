<?php



namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Inertia\Inertia;


class CalendarController extends Controller
{
    /**
     * Display the calendar view.
     */
    public function index()
    {
        return Inertia::render('Dashboard/Calendar');
    }

    // Additional methods for handling calendar events can be added here
}
