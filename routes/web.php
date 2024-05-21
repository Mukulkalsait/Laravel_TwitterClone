<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\IdeaController as ControllersIdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*   |  ////////////////////////////////////////////////////////////////////////////////////////////  |
//   |  ////////////////////////////  METHOD - 1 Direct use of Route ///////////////////////////////  |
//   |  ////////////////////////////  METHOD - 1 Direct use of Route ///////////////////////////////  |
//   |  ////////////////////////////////////////////////////////////////////////////////////////////  |

//     ___________________________________________________________________________________
//    |                                                                                   |
//    |  Route::get('/{location in BROWSER}', function () {                               |
//    |      return view('location in resources/views/ => (name).blade.php');             |
//    |      eg  return view('welcome'); ===> in resources/views/ => welcome.blade.php);  |
//    |  });                                                                              |
//    |___________________________________________________________________________________|


        Route::get('/', function () {return view('welcome');});
        Route::get('/feed',function (){return view('feed');});
        Route::get('profile',function(){return view('users.profile');});

// get = $_GET or post = $_POST ; '/' = ROOT FOLDER
// view = inside of resources/views  (in place of view you can add <h1>H1</h1> real HTML)
//  location ==> views/users/profile.blade.php
//__________________________________________________________ end __________________________________________________________|

 */



















/*        _____________________________________________________________________________________________________
//        |  ///////////////////////////////////////////////////////////////////////////////////////////////  |
//        |  ////////////////////////////  METHOD - 2 modal view conmtroller ///////////////////////////////  |
//        |  ////////////////////////////  METHOD - 2 modal view conmtroller ///////////////////////////////  |
//        |  ///////////////////////////////////////////////////////////////////////////////////////////////  |

//                               |==================================|
//                               |  MVC = modal view conmtroller    |
//                               |==================================|
//   ____________________________________________________________________________________________________________________|
//                  m= modal      = the one who controlles databace; (Logic Interaction with Databace)
//                  v= view       = the one who have all the viewable files; (HTML css Blade )
//                  c= controller = the one who controll M & V ang decides what to do;(request Handler)
//   ____________________________________________________________________________________________________________________|

//   1. create a modal with - php artisan make:moddel;
//   2. use Route::method('/browserLocation',[ControllerName::class,'functionNameInController']->name('assignItName'));
//                                                                                                     ^^^^^^^^^^^^^
//   3. in url use ===> {{ route('assignItName') }}  --------------------------------------------------|||||||||||||
//         or
//   4. in url use ===> {{ url('/idea') }}   ----- from ('/browserLocation');
//   _____________________________________________________________________________________________________________________|
*/





Route::get('/',[ DashboardController::class ,'index'])->name('dashboard');
Route::get('/1', function () {return view('info');});
/*  index()[indside DashboardController] ===>
          redirect to dashboard + fetch ideas from IDEA MODEL (coontent + Likes)my
    & (moedl<-database)+orderd by dreated_at.
________________________________________________________________________________|
*/

Route::post('/idea',[ IdeaController::class ,'store'])->name('idea.create');
/*  store()[indside IdeaController] ===>

1.   Requests & Validates  ideas that are FETCHED from "Content" of PAGE...
2.   create new idea with {$idea = idea::create} store it inside DB
3.   Redirect to Dashboard (dashboard fetch ideas from DB that has new idea)
+ "with" provide SUCCESS Message.
________________________________________________________________________________|
*/

Route::get('/idea/{idea}',[ IdeaController::class ,'show'])->name('idea.show');

Route::get('/idea/{idea}/edit',[ IdeaController::class ,'edit'])->name('idea.edit');

Route::put('/idea/{idea}',[ IdeaController::class ,'update'])->name('idea.update');

/* we could have use something like this but to update in laravel we have ::PUT so we removed /update
Route::get('/idea/{idea}/update',[ IdeaController::class ,'update'])->name('idea.update');
*/



Route::delete('/idea/{idea}',[ IdeaController::class ,'destroy'])->name('idea.destroy');
/*  store()[indside IdeaController] ===>

1.   Requests & Validates  ideas that are FETCHED from "Content" of PAGE...
2.   create new idea with {$idea = idea::create} store it inside DB
3.   Redirect to Dashboard (dashboard fetch ideas from DB that has new idea)
+ "with" provide SUCCESS Message.
________________________________________________________________________________|
*/














// Route::get('/idea',[ IdeaController::class ,'class'])->name('idea.index');
// Route::get('/profile',[DashboardController::class , 'profile']);
// Route::get('/about',[DashboardController::class,'about']);
// Route::get('/terms',[DashboardController::class, 'terms']);
