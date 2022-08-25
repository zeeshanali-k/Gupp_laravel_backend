<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationsController extends Controller
{
    public function index()
    {
        return Notification::latest()->get();
    }
}
