<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function verify(Request $request)
    {
        $usersRes=User::where("email",$request->email)
                    ->get();
        if(count($usersRes)==0){
            $user=new User();
            $user->setAttribute("exists",false);
            return $user;
        }
        $user=$usersRes[0];
        
        if(!Hash::check($request->password,$user->password)){
            $user=new User();
            $user->message="Incorrect Password";
            return $user;
        }

        $user->setAttribute("exists",true);
        return $user;
    }
    
    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            return $user;
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            $user=new User();
            if($errorCode == 1062){
                $user->message="Email already exists";
                return $user;
            }else{
                $user->message="Some error occurred while registering";
                return $user;
            }
        }
    }
// Shows only users who are not friends
    public function index()
    {
        // $users=DB::table("users")->select('id')
        //     ->where("id","=",request("id"))
        //     ->whereNotIn('id',function($query) {
        //         $query->select('user_id')
        //             ->from('friends');
        //         $query->select('friend_id')
        //             ->from('friends');
        //  })
        //  ->get();
        $users = User::where("id","!=",request("id"))->get();
         return $users;
    }

    public function updateImage(Request $request)
    {
        $userId= request("id");
        $profileImage = $request->file("profile");
        $fileExt = $profileImage->getClientOriginalExtension();
        $fileName = 'User_' . $userId . '.png';
        // Saving
        $profileImage->storeAs("public/profile_images", $fileName);
        $quoteUrl = asset('storage/profile_images/' . $fileName);
        $user = User::find($userId);
        $user->profile_image = $quoteUrl;
        $user->save();
        return ["url"=>$quoteUrl];
    }

}
