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
        $days= $request->input("days");
        
        // Sincronizar la suscripción para el usuario
        $user->suscripcions()->sync([$subscriptionId]);

        // Obtener la suscripción asociada al usuario
        $subscription = $user->suscripcions()->where('suscripcion_id', $subscriptionId)->first();

        // Obtener la fecha actual
        $today = Carbon::today();

        // Calcular la fecha de finalización basada en la duración
        $endDate = $today->copy()->addDays($days);

        // Actualizar las fechas de inicio y finalización de la suscripción
        $subscription->pivot->start_date = $today;
        $subscription->pivot->end_date = $endDate;
        $subscription->pivot->save();
    }
}
