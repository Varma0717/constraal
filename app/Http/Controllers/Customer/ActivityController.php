<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display customer activity history
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $activities = $user->activities()->paginate(20);

        return view('customer.activity.index', ['activities' => $activities]);
    }
}
