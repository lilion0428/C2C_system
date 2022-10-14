<?php

namespace App\Http\Controllers;

use App\Models\Entities\User;
use App\Models\Repositories\UserRepository;
use App\Models\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Validator;


/**
 * @group User 使用者
 *
 */
class UserController extends Controller implements MustVerifyEmail
{
    use Notifiable;
    private $userService;
    private $userRepository;

    public function __construct()
    {
        $this->userService =new UserService();
        $this->userRepository = new UserRepository();
    }
    //
    /**
    * register user 註冊會員
    *
    * @return Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|between:2,100',
        'email' => 'requied|email',
        'password' => 'required|regex:/[0-9a-zA-Z]{8}/',//只能使用數字及字母,至少8個字元
        'address' => 'required|string',
        'phone' => 'required|regex:/(09)[0-9]{8}/',
        ]);
        if ($validator->fails()) {
            return $this->error($validator->errors()->toJson());
        }

        $isPhoneUser = User::where('phone', $request->phone)->first();
        if($isPhoneUser){
            return $this->error("電話號碼重複");
        }

        $identity_num=2;

    }

}
