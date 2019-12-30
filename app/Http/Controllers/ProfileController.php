<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }

    //index profile
    public function index()
    {
        return view('front.profile.index');
    }
    // thankyou
    public function thankyou()
    {
        return view('front.profile.thankyou');
    }

    public function orders()
    {
        try {
            $user_id = $this->userRepository->getId();
            //$orders = $this->orderDao->getAllOrdersOfUserID(($user_id));
            $orders = DB::table('order_product')
                ->leftJoin('products', 'products.id', '=', 'order_product.product_id')
                ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
                ->where('orders.user_id', '=', $user_id)
                ->get();

            $user = Auth::user();
            //$orders =
            return view('front.profile.orders', compact('orders'));
        }
        catch (Exception $ex)
        {

        }
    }

    public function address()
    {
        $user_id = $this->userRepository->getId();
        $address_data = $this->userRepository->getAddressByUserId($user_id);
        //var_dump($address_user);
        return view('front.profile.address', compact('address_data'));
    }
// Update password
    public function UpdateAddress(Request $request){
        $request->validate([
            'fullname' => 'required|max:255',
            'city' => 'required',
            'pincode' => 'required',
        ]);

        $input = $request->all();

        $user_id = $this->userRepository->getId();
        $address_data = $this->userRepository->getAddressByUserId($user_id);
        $address_data->fill($input)->save();

        Session::flash('inf', 'You succesfully updated.');
        return redirect()->back();
    }
    /*
     *Change Password View
     */
    public function password()
    {
        return view('front.profile.changePassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required|max:255',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = $this->userRepository->getUser();

        $oldPass = $request->input('old_password');
        $newPassword = $request->input('new_password');

        $isCheckPass = $this->userRepository->checkPassword($oldPass);
        // if pass true
        if ($isCheckPass){
            $this->userRepository->updatePassword($newPassword);
            Session::flash('inf', 'You succesfully updated.');
            return redirect()->back();
            //$request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
        }else{
            Session::flash('err', 'You Errors.');
            return redirect()->back(); //when user enter wrong password as current password
        }
    }
}

