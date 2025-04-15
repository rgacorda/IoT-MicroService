<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentFeature(Request $request)
    {
        $validated = $request->validate([
            'feature_id' => ['required'],
        ]);
        $user = Auth::user();
        $feature = Feature::find($validated['feature_id']);

        if (! $user->hasPermissionTo($feature->permission_name)) {
            $user->givePermissionTo($feature->permission_name);
        }

        return response()->json([
            'message' => 'Feature purchased successfully.',
            'feature' => $feature->name,
            'granted_permission' => $feature->permission_name,
        ]);
    }

}
