<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(is_null($user)){
            return response()->json(['success' => false, 'message' => "Invalid Request"], 401);
        }else{
        $user = User::with('profile')->find($user->id);
        return response()->json(['success' => true, 'data' => $user], 200);
    }
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
        $user = auth()->user();
        if($user){
            $updateArray = [];
            if($request->input('pass_code')){
                $updateArray['pass_code'] = $request->input('pass_code');
            }
            if(!empty($updateArray)){
                User::where('id',$user->id)->update( $updateArray);
            }
            return response()->json(['success' => true, 'user' => $user], 200);
        }else{
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
    public function update(Request $request,$id)
    {
        // dd($request->all(), $id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'phone' => "required|unique:users,phone,$id",
            'pass_code' => 'required',
            'referal_code' => "required|unique:users,referal_code,$id",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $profile_pic = Null;
        if ($request->hasFile('profile_pic')) {
            $profile_pic = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('storage/user/'.$id.'/profile') , $profile_pic);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->pass_code = $request->pass_code;
        $user->referal_code = $request->referal_code;
        $user->save();
        
        $profile = Profile::where('user_id','=', $user->id)->first();
        $profile->profile_pic =  $profile_pic;
        $profile->save();

        return response()->json(['success' => true, 'message' => "update data successfully.",'data' => [$user, 'profile' => $profile->profile_pic]], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
