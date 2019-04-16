<?php

namespace Heisen\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Heisen\Cart;
use Heisen\User;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // try { $cart = Cart::findOrFail($request->cart->id); }
        // catch ( \Exception $e) {
        //     $cart = Cart::create(
        //         [
        //             'uuid' => Cart::makeUuid(),
        //             'user_id' => Auth::user()->id
        //         ]
        //     );
        // }

        // View::share('cart', $cart);

    }
}
