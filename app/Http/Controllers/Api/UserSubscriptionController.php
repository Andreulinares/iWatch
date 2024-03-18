<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Carbon\Carbon; 
use App\Http\Controllers\Controller;

class UserSubscriptionController extends Controller
{
    public function subscribe(Request $request, $subscriptionId)
    {
        $user = Auth::user();
        $user->suscripcions()->sync([$subscriptionId]);
        // $subscription = new Subscription();
        // $subscription->user_id = $user->id;
        // $subscription->suscripcion_id = $subscriptionId;
        // $subscription->start_date = Carbon::now();
        // $subscription->end_date = Carbon::now()->addDays(30);
        // $subscription->save();
    }
}
