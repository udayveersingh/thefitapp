<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserIncomeSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserIncomeSummaryController extends Controller
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
        return response()->json(['success' => 'true'], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'credit_amount' => 'required',
            'debit_amount' => 'required',
            'transaction_type' => 'required',
            'transaction_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = auth()->user();
        if ($user) {
            $user_income_summary = UserIncomeSummary::create([
                'user_id' => $user->id,
                'credit_amount' => $request->credit_amount,
                'debit_amount' => $request->debit_amount,
                'transaction_type' => $request->transaction_type,
                'transaction_date' => $request->transaction_date,
            ]);
            return response()->json(['success' => true, 'user_income_summary' => $user_income_summary], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Invalid Token"], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
