<?php

namespace App;

use App\Http\Controllers\CartDao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['status','total', 'user_id' ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function orderFields() {
        // insert bang trung gian
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function createOder()
    {
        $user = Auth::user();
        // tao moi order
        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending']);
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            // tao moi chi tiet hoa don
            //$order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
            $order->products()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);

        }
    }
}
