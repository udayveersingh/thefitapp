<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTracker;
use Illuminate\Support\Facades\Validator;

class UserTrackerController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(is_null($user)){
            return response()->json(['success' => false, 'message' => "Invalid Request"], 401);
        }
        $user_tracker = UserTracker::where('user_id','=',$user->id)->get();
        if(!empty($user_tracker)){
        return response()->json(['success' => true,'user_tracker' => $user_tracker], 200);
        }else{
            return response()->json(['success' => 'true'], 200);
        }
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'step_count' => 'required',
            'calories' => 'required',
            'move_min' => 'required',
            'miles' => 'required',
            'reward_amount' => 'required',
            'step_count_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = auth()->user();
        if($user){
            $user_tracker = UserTracker::create([
                'user_id' => $user->id,
                'step_count' => $request->step_count,
                'step_count_date' => $request->step_count_date,
                'reward_amount' => $request->reward_amount,
                'calories' => $request->calories,
                'move_min' => $request->move_min,
                'miles' => $request->miles,
            ]);
         return response()->json(['success' => true, 'user_tracker' => $user_tracker], 200);
        }else{
            return response()->json(['success' => false, 'message' => "Invalid Token"], 401);
        }
    }
}
