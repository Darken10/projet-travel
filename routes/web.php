<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Root\PaysController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Root\VilleController;
use App\Http\Controllers\Root\RegionController;
use App\Http\Controllers\Chat\MessageController;
use App\Http\Controllers\Root\ProvinceController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Root\CompagnieController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\Voyage\LigneController;
use App\Http\Controllers\Admin\Voyage\CheminController;
use App\Http\Controllers\Admin\Voyage\CourseController;
use App\Http\Controllers\Admin\Voyage\AdminVoyageController;
use App\Http\Controllers\Admin\Ticket\ValiderTicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/** Root  */
Route::prefix('/root')->middleware(['auth','role:root'])->name('root.')->group(function () {
    // Compagnie
    Route::resource('/compagnie', CompagnieController::class)->except(['show'])->middleware('auth');

    //Ville
    Route::resource('/ville', VilleController::class)->except(['show'])->middleware('auth');
    Route::resource('/pays', PaysController::class)->except(['show'])->middleware('auth');
    Route::resource('/region', RegionController::class)->except(['show'])->middleware('auth');
    Route::resource('/province', ProvinceController::class)->except(['show'])->middleware('auth');

    //
});



/** Administration  */
Route::prefix('/admin')->middleware(['auth','role:admin'])->name('admin.')->group(function () {
    Route::resource('post', AdminPostController::class)->except(['show'])->middleware('auth');
    Route::get('{post}/deleteImage/{image}', [AdminPostController::class,'deleteImages'])->name('post.deleteImages')->where([
        'post' => '[0-9]+',
        'image' => '[0-9]+',
    ]);
    Route::resource('tag', AdminTagController::class)->except(['show'])->middleware('auth');

    // la gestion des voyage notament (lignes;voyages,les coures)
    Route::prefix('/voyage')->name('voyage.')->group(function(){
        Route::resource('ligne', LigneController::class)->except(['show']);
        Route::resource('course', CourseController::class)->except(['show']);
        Route::resource('voyage', AdminVoyageController::class)->except(['show']);
        Route::resource('chemin', CheminController::class)->except(['show']);
    });

    // la liste des user qui on liker le post
    Route::get('/{post}/like/list',[AdminPostController::class,'likeListPost'])->name('likeListPost')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');


    Route::prefix('/post/comments')->name('comment.')->controller(AdminCommentController::class)->group(function () {
        //liste des commentaire et avec poste
        Route::get('/{post}', 'index')->name('index')->where([
            'post' => '[0-9]+',
        ]);
        //les reponses avec le commentaire et le poste
        Route::get('/{comment}/reponse', 'show')->name('show')->where([
            'comment' => '[0-9]+',
        ]);
        // store la reponse
        Route::post('/{comment}/Sreponse', 'storeReponse')->name('storeReponse')->where([
            'comment' => '[0-9]+',
        ]);
    });

    // Dashbord
    Route::get('/', [HomeController::class,'dashbord'])->name('index');
});


/** Client */
//Post
Route::prefix('/')->name('post.')->middleware('auth')->controller(PostController::class)->group(function () {
    Route::get('/','index')->name('index');


    Route::get('/{post}','show')->name('show')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{tag}/tag','filterByTag')->name('filterByTag')->where([
        'tag'=>'[0-9]+',
    ])->middleware('auth');

    
    Route::get('/{post}/like','storeLikePost')->name('storeLikePost')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{post}/like/list','likeList')->name('likeList')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');


    Route::post('/{post}','storeComment')->name('storeComment')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{comment}/comment','reponse')->name('reponse')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');

    Route::post('/{comment}/reponse','storeReponse')->name('storeReponse')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{comment}/comment/like','storeLikeComment')->name('storeLikeComment')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{reponse}/reponse/like','storeLikeReponse')->name('storeLikeReponse')->where([
        'reponse'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{compagnie}/compagnie','filterByCompagnie')->name('filterByCompagnie')->where([
        'compagnie'=>'[0-9]+',
    ])->middleware('auth');


});

// les voyages
Route::prefix('/voyage')->name('voyage.')->controller(VoyageController::class)->middleware('auth')->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/','search');

    Route::get('/{voyage}','show')->name('show')->where([
        'voyage'=>'[0-9]+',
    ]);
    Route::post('/{voyage}','reserver')->where([
        'voyage'=>'[0-9]+',
    ]);

});

Route::prefix('/ticket')->name('ticket.')->controller(TicketController::class)->middleware('auth')->group(function(){

    Route::get('/mes-tickets','mesTickets')->name('mes-tickets');
    Route::get('/mes-tickets/{ticket}','show')->name('show')->where([
        'ticket'=>'[0-9]+',
    ]);

    Route::post('/mes-tickets/{ticket}','acheter')->name('acheter')->where([
        'ticket'=>'[0-9]+',
    ]);

    Route::get('/mes-tickets/payement/{ticket}','payerForm')->name('payerForm')->where([
        'ticket'=>'[0-9]+',
    ]);

    Route::post('/mes-tickets/payement/{ticket}','payer')->name('payer')->where([
        'ticket'=>'[0-9]+',
    ]);
    
    Route::get('/mes-ticket/payer/{payer}','payer_show')->name('payer_show')->where([
        'payer'=>'[0-9]+',
    ]);
    
});


/** Validation d'un ticket */
Route::prefix('/ticket-validation')->name('admin.ticket-validation.')->controller(ValiderTicketController::class)->middleware(['auth','role:admin'])->group(function(){
    Route::post('/{ticket}/verifier','verifier')->name('verification')->where([
        'ticket'=>'[0-9]+',
    ]);
    Route::post('/{ticket}/suspendre','suspendre')->name('suspendre')->where([
        'ticket'=>'[0-9]+',
    ]);

    /** La verificatione de l'authenticiter du ticket */
    Route::get('/{ticket}/valider','valider')->name('valider')->where([
        'ticket'=>'[0-9]+',
    ]);

});





/** Chat (Conversation) */
Route::prefix('/conversations')->name('chat.')->controller(MessageController::class)->middleware(['auth',])->group(function (){
    Route::get('/','index')->name('index');
    Route::get('/user/{user}','show')->name('show')->middleware('can:talkTo,user')->where([
        'user'=>'[0-9]+',
    ]);
    Route::post('/user/{user}','store')->name('store')->middleware('can:talkTo,user')->where([
        'user'=>'[0-9]+',
    ]);

    Route::get('/compagnie/{compagnie}','compagnieShow')->name('compagnieShow')->where([
        'compagnie'=>'[0-9]+',
    ]);
    Route::post('/compagnie/{compagnie}','compagnieStore')->where([
        'compagnie'=>'[0-9]+',
    ]);
});






Route::middleware('auth')->name('user.')->group(function () {
    Route::get('/user/profile', [UserController::class,'showProfile'])->name('profile.show');
});


/** Auth */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
