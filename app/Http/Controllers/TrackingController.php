<?php

namespace App\Http\Controllers;

class TrackingController extends Controller
{
   public function show(Request $request)
   {
       $tracking = Package::where('tracking_number', $request->number)
           ->with('trackings')
           ->firstOrFail();

       return view('tracking.show', compact('tracking'));
   }
}
