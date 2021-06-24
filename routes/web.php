<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\Register\EmailController;
use App\Http\Controllers\Auth\Login\EmailController as LoginWithEmailController;
use App\Http\Controllers\Portal\ClientController;
use App\Http\Controllers\UserWalletController;
use App\Http\Controllers\Wallet\CreateWalletController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('frontpage');

Route::prefix('administrator')->name('administrator.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});


Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::resource('wallet', UserWalletController::class);
});

Route::middleware('guest')->group(function () {
    Route::get('register-new-user', function () {
        return redirect()->route('register.social-media');
    })->name('register');
    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('register.email.part.one');
        })->middleware('check.referral')->name('email');
        Route::get('email', [EmailController::class, 'partOneForm'])->name('email.part.one');
        Route::get('email/{temp:uuid}', [EmailController::class, 'partTwoForm'])->name('email.part.two');
        Route::post('email', [EmailController::class, 'registerPartOne'])->name('email.part.one.store');
        Route::post('email-part-two', [EmailController::class, 'registerPartTwo'])->name('email.part.two.store');
        Route::view('social-media', 'auth.social-media.register', ['type' => 'register'])->name('social-media');
    });

    Route::get('login-user', function () {
        return redirect()->route('login.social-media');
    })->name('login');
    Route::prefix('login')->name('login.')->middleware('guest')->group(function () {
        Route::get('/', function () {
            return redirect()->route('login.social-media');
        });
        Route::get('email', [LoginWithEmailController::class, 'showLoginForm'])->name('email');
        Route::post('email', [LoginWithEmailController::class, 'login']);
        Route::view('social-media', 'auth.social-media.login', ['type' => 'login'])->name('social-media');
    });

    Route::prefix('verification')->name('verify.')->group(function () {
        Route::get('email', [\App\Http\Controllers\Verification\EmailController::class, 'index'])->name('email');
    });

    Route::post('monnify-incoming', [\App\Http\Controllers\Wallet\MonnifyController::class, '__invoke']);
});

Route::post('wallet-creation', [CreateWalletController::class, 'initialize'])->name('wallet.create');

Route::prefix('authentication')->group(function () {

    Route::prefix('google')->group(function () {
        Route::get('/redirect', function () {
            return Socialite::driver('google')->redirect();
        })->name('authentication.google');

        Route::get('/callback', function () {
            $user = Socialite::driver('google')->user();
            // $newUser = \App\Models\User::firstOrCreate(
            //     ['email' => $user->getEmail()],
            //     [
            //         'name' =>  $user->getName(),
            //         'provider' => 'google',
            //         'provider_id'  => $user->getId(),
            //         'access_token' => $user->token,
            //         'email_verified_at' => now()
            //     ]
            // );
            // Auth::guard()->login($user);
            return redirect()->route('dashboard.index');
        });
    });

    // Route::prefix('facebook')->group(function () {
    //     Route::get('/redirect', function () {
    //         return Socialite::driver('facebook')->redirect();
    //     })->name('authentication.facebook');

    //     Route::get('/callback', function () {
    //         $user = Socialite::driver('facebook')->user();
    //         $newUser = \App\Models\User::firstOrCreate(
    //             ['email' => $user->getEmail()],
    //             [
    //                 'name' =>  $user->getName(),
    //                 'avatar' => $user->getAvatar(),
    //                 'username' => Str::slug($user->getName(), '-') . '-' . rand(0, 9999999),

    //                 'password' => '',
    //                 'provider' => 'facebook',
    //                 'provider_id'  => $user->getId(),
    //                 'access_token' => $user->token,
    //                 'email_verified_at' => now()
    //             ]
    //         );
    //         Auth::guard()->login($newUser);
    //         return redirect()->route('dashboard.index');
    //     });
    // });
});

Auth::routes([
    'login'    => false,
    'logout'   => true,
    'register' => false,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => true,  // for email verification
]);
