<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAgent;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckEmail;
use App\Http\Middleware\CheckGuess;
use App\Http\Middleware\CheckResetPassword;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session()->forget(['reset_email', 'code']);
    $posts = Post::limit(8)->get();
    $buyCount = Post::where('type', '=', 'sell')->count();
    $rentCount = Post::where('type', '=', 'rent')->count();
    $propertiesCount = Post::count();
    $agentCount = User::where('type', '=', 'agent')->count();
    $agents = User::where('type', '=', 'agent')->limit(3)->get();
    $rates = Rate::limit(4)->get();

    if (Auth::check()) {
        $homeMyPosts = Post::where('user_id', '=', Auth::user()->id)->get();
        $homePosts = Post::all()->where('user_id', '!=', Auth::user()->id);
        return view('home', ['posts' => $homePosts, 'myPosts' => $homeMyPosts, 'agents' => $agents]);
    }
    return view('welcome', ['posts' => $posts, 'buyCount' => $buyCount, 'rentCount' => $rentCount, 'propertiesCount' => $propertiesCount, 'agentCount' => $agentCount, 'rates' => $rates, 'agents' => $agents]);
})->name('home');
Route::middleware([CheckGuess::class])->group(function () {
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('show.signup.user');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.user');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login.user');
    Route::post('/login', [AuthController::class, 'login'])->name('login.user');
    Route::get('/signup/confirm_email', [AuthController::class, 'showConfirmEmail'])->name('confirm.email');
    Route::post('/signup/confirm_email', [AuthController::class, 'storeUser'])->name('store.user');
    Route::get('/login/forget_password', [AuthController::class, 'showForgetPassword'])->name('show.forgetpassword.login.user');
    Route::post('/login/forget_password', [AuthController::class, 'sendMail'])->name('verifycode');
    Route::get('/login/forget_password/confirm_email', [AuthController::class, 'showConfirmEmailToResetPassword'])->name('show.confirm.email.reset.password');
    Route::post('/login/forget_password/confirm_email', [AuthController::class, 'confirmEmailToResetPassword'])->name('confirm.email.reset.password');
    Route::middleware([CheckResetPassword::class])->group(function () {
        Route::get('/login/reset_password', [AuthController::class, 'showResetPassword'])->name('show.reset.password');
        Route::put('/login/reset_password', [AuthController::class, 'resetPassword'])->name('reset.password');
    });
});
Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('show.profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('update.profile');
    Route::post('/profile/delete', [AuthController::class, 'deleteProfile'])->name('delete.profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/profile/addpost', [PostController::class, 'showAddPost'])->name('show.addpost');
    Route::post('/profile/addpost', [PostController::class, 'store'])->name('store.post');
    Route::get('/profile/edit/{id}', [PostController::class, 'showEdit'])->name('show.edit.post');
    Route::put('/profile/update/{id}', [PostController::class, 'edit'])->name('edit.post');
    Route::delete('/profile/delete/{id}', [PostController::class, 'delete'])->name('delete.post');
    Route::middleware([CheckAgent::class])->group(function () {
        Route::post('/request_agent', [AgentController::class, 'requestAgent'])->name('send.request.agent');
    });
    Route::post('/rate', [RateController::class, 'store'])->name('rate.website');
    Route::post('/review/{agentId}', [ReviewController::class, 'store'])->name('review.agent');
});
Route::middleware([CheckAuth::class])->group(function () {
    Route::middleware([CheckAdmin::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('show.dashboard.admin');
        Route::get('/dashboard/users', [AdminController::class, 'showUsers'])->name('show.users.admin');
        Route::get('/dashboard/agents', [AdminController::class, 'showAgents'])->name('show.agents.admin');
        Route::get('/dashboard/properties', [AdminController::class, 'showProperties'])->name('show.properties.admin');
        Route::get('/dashboard/rates', [AdminController::class, 'showRates'])->name('show.rates.admin');
        Route::get('/dashboard/reviews', [AdminController::class, 'showReviews'])->name('show.reviews.admin');
        Route::get('/dashboard/request_agents', [AdminController::class, 'showRequestAgents'])->name('show.request_agents.admin');

        Route::post('/dashboard/request_agents/manage/{id}', [AdminController::class, 'manageRequestAdmin'])->name('manage.request.admin');

        Route::delete('/dashboard/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user.admin');
        Route::delete('/dashboard/properties/delete/{id}', [AdminController::class, 'deleteProperty'])->name('delete.property.admin');
        Route::delete('/dashboard/rates/delete/{id}', [AdminController::class, 'deleteRate'])->name('delete.rate.admin');
        Route::delete('/dashboard/revies/delete/{id}', [AdminController::class, 'deleteReview'])->name('delete.reviews.admin');
    });
});
Route::get('/buy', [PostController::class, 'showBuyPosts'])->name('show.buy.post');
Route::get('/rent', [PostController::class, 'showRentPosts'])->name(name: 'show.rent.post');
Route::get('/post/{id}/view_detail', [PostController::class, 'showDetail'])->name('view.post');
Route::get('/agents', [AgentController::class, 'showAgents'])->name('show.agent');
Route::get('/agents/{id}', [AgentController::class, 'showAget'])->name('view.detail.agent');
Route::get('/search_home', [SearchController::class, 'homeSearch'])->name('show.search.home');
Route::get('/search_buy', [SearchController::class, 'buySearch'])->name('show.search.buy');
Route::get('/search_rent', [SearchController::class, 'rentSearch'])->name('show.search.rent');


Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

use App\Http\Controllers\ContactController;

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
