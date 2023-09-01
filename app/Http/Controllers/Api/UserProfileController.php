<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
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
            'profile_pic' => 'required',
            'wallet_address' => 'required',
            'kyc_doc_1' => 'required',
            'kyc_doc_2' => 'required',
            'kyc_status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = auth()->user();
        if ($user) {
            $profile_pic = Null;
            if ($request->hasFile('profile_pic')) {
                $profile_pic = time() . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('storage/user/'.$user->id.'/profile') , $profile_pic);
            }

            $kyc_doc_1= null;
            if($request->kyc_doc_1){
                $kyc_doc_1 = time() . '.' . $request->kyc_doc_1;
                $request->kyc_doc_1->move(public_path('storage/user/'.$user->id.'/kyc_doc_1'),  $kyc_doc_1);
            }

            $kyc_doc_2= null;
            if($request->kyc_doc_2){
                $kyc_doc_2 = time() . '.' . $request->kyc_doc_2;
                $request->kyc_doc_2->move(public_path('storage/user/'.$user->id.'/kyc_doc_2'),  $kyc_doc_2);
            }

            $user_profile = Profile::create([
                'user_id' => $user->id,
                'profile_pic' => $profile_pic,
                'wallet_address' => $request->wallet_address,
                'kyc_doc_1' =>  $kyc_doc_1,
                'kyc_doc_2' => $kyc_doc_2,
                'kyc_status' => $request->kyc_status,
            ]);
            return response()->json(['success' => true, 'user_profile' => $user_profile], 200);
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
