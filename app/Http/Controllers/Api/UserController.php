<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        

        $response = [
            'user'=> $user,
            'token'=>$token,
            'home sections'=>AppHomePageController::getHomeSections($user, $request),
            'merchant category'=> CategoryController::getMerchantCategory(),
            'ListOfSavedOffers'=> OfferController::getListOfSavedOffers($user->id),
            'savings'=> OfferController::getSavings($user),
        ];

        return response($response,201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'You have been successfully logged out.'], 200);
    }

    public function signup(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email'    => 'required',
            'password' => 'required|min:8',
            'country_code'=>'required',
            'phone_number'=> 'required',
            'age' => 'required',
            'country_id' => 'required',
            'region' =>'required',
            'city' =>'required',
            'address' =>'required',
            'zipcode' =>'required',
        ]; 
    
        $input     = $request->only('name', 'email','password','country_code','phone_number','age','country_id','region','city','address','zipcode','plan_id');
        
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email    = $request->email;
        $password = $request->password;
        $country_code = $request->country_code;
        $phone_number = $request->phone_number;
        $gender =$request->gender;
        $role_id = 1;
        $age =$request->age;
        $country_id =$request->country_id;
        $region =$request->region;
        $city =$request->city;
        $address =$request->address;
        $zipcode =$request->zipcode;
        $activated = $request->activated;

        $checkEmail=User::where('email',$email)->first();
        if($checkEmail){
            return response([
                'message' => ['this email is already existed.']
            ], 409);
        }
        
        $checkNbr=User::where('phone_number',$phone_number)->where('country_code',$country_code)->first();
        if($checkNbr){
            return response([
                'message' => ['this phone number is already taken.']
            ], 409);
        }

        else{
            $user = User::create([
                'name' => $name,
                'email' => $email, 
                'password' => Hash::make($password),
                'country_code' => $country_code,
                'phone_number'=> $phone_number,
                'role_id'=>$role_id,
                'age'=>$age,
                'gender'=>$gender,
                'country_id'=>$country_id,
                'region'=>$region,
                'city'=>$city,
                'address'=>$address,
                'zipcode'=>$zipcode,
                'activated'=>$activated
            ]);

            $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'user'=> $user,
                'token'=>$token,
                'home sections'=>AppHomePageController::getHomeSections($user, $request),
                'merchant category'=> CategoryController::getMerchantCategory(),
                'savings'=> OfferController::getSavings($user),
            ];
    
            return response($response,201);
        }
    }
    
    public function forgetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email    = $request->email;

        $checkEmail=User::where('email',$email)->first();
        if(!$checkEmail){
            return response([
                'message' => ['this email is not found.']
            ], 404);
        }
        else{
            $status = Password::sendResetLink(
                $request->only('email')
            );
        
            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);
        }
    }

    public function AccountInfo()
    {
        $user = Auth::user();
        if($user->profile_pic!=null){
            $user->profile_pic = env('APP_URL') . "/public/assets/profile_pics/" . $user->profile_pic;
        }
        
        $response = [
            'user'=> $user
        ];
        return response($response , 201);
    } 

    public function EditAccountInfo(Request $request)
    {
        $user = $request->user();

        if ($request->hasFile('pic')) {

            if ($user->profile_pic != null) {
                $image_path =public_path('/assets/profile_pics/' .   $user->profile_pic) ;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
           $user->update($request->all());

            $image = $request->file('profile_pic');


            $imageName = time() . $user->name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/profile_pics/');


            $image->move($destinationPath, $imageName);


            $user->update([
                "pic" => $imageName
            ]);
        }
        else{
            $user->update($request->all());
        }
        
 
        return response($user,201);
    }

    public function Countries()
    {
        $countries = Country::all();
        $response = [
            'country'=> $countries
        ];
        return response($response,201);
    }
}
