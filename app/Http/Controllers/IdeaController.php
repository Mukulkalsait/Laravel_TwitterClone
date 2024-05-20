<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate(['content' => 'required | min:3 | max:240']);   // fields required Min/Max characters 3/240 link ===> (https://laravel.com/docs/11.x/validation#available-validation-rules)
        // dump(request()->get('idea',''));   === (cheaker)

        /*
       |------------ Conventional way to store ---------|
       |   $idea = new idea([                           |
       |       'content' => request()->get('idea',''),  |
       |   ]);                                          |
       |   $idea->save();                               |
       |________________________________________________| */

        //--------New and SMALLER method to Store ------------

        $idea = idea::create(['content' => request()->get('content', ''),]);

        // 1st ides:: create must be creating idea inside database...
        // content is from the content inside textarea that is going to store inside tha databace.the idea is requested by get method from page

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully !!!');  // code to return dashboard + show success message

        // ***********************When we redirect back to dashboard it will get relad and fetch the data
        //                      from databace adding updated idea above .....

        /*
           ((((((((((((((((((((  E-X-P-L-I-N-A-T-I-O-N  ))))))))))))))))))))
           _________________________________________________________________________________
          |            redirect()->route('dashboard')->^^^^^                                |
          |            "with" add extra ONE TIME FUNCTION                                   |
          |                              where                                              |
          |            1st parameter     -   'success' is its name                          |
          |            2nd parameter     -   'Idea created Successfully !!!'                |
          |     ***WITH pairs with (SESSION()->HAS())                                       |
          |                                                                                 |
          |            with('name') pair with                                               |
          |       @if(session()->has('name'))...                                            |
          |                                                                                 |
          |   inside ===> {{session('success )}} ===> 'Idea created Successfully !!!'       |
          |                                                                                 |
          |       @endif                                                                    |
          |_________________________________________________________________________________|
          */
    }


    /*CONVENTIONAL WAY______________________________________________________________________________________________________

    public function destroy($id){

        //  idea::where('id',$id)->get();                         // this get will gwt multuple requests
        $idea = idea::where('id', $idea)->firstOrFail();          //  hence we used firstOrFail() so the first one is Feached -
        $idea->delete();                                          //  or 404 is given(if we tap too fast no id passed so 404).

        //    ***************************************************************
        //
        //    :IN SINGLE LINE
        //     ____________________________________________________________________________
        //    |                                                                            |
        //    |          idea::where('id', $id)->firstOrFail()->delete();                  |
        //    |____________________________________________________________________________|
        //
        //          ((((((((((((E-X-P-L-I-N-A-T-I-O-N))))))))))))
        //
        //      HEAR =
        //      idea::( targets idea by method(idea) inside DB  )
        //      where('id',$id) in DB 'id' matches $id(the one thats passed from idea-card.blade.php)
        //      ->get()                                                   or
        //      ->first() to fetch from DB                                or
        //      ->firstOrFail() fetch from DB or through ERROR 404 ***(if we tap too fast no id passed so 404)
        //      &
        //      ->delete() to delete it;
        //
        return redirect()->route('dashboard')->with('deleted', 'Idea deleted Successfully !!!');  // explained above.
    }
*/
    //  CONVENTIONAL WAY END_________________________________________________________________________________________________


    // MODERN WAY with CONDUCTIONS __________________________________________________________________________________________

    public function destroy(idea $idea)
    {
        $idea->delete();
        /*    ((((((((((((E-X-P-L-I-N-A-T-I-O-N))))))))))))

        1. if we pass (idea $id) in
         public function destroy() the 'idea' will automaticly understand that we have to fetch it from DB matching the $ID
        2. ->delete() will delete it.

        BUT $id must match to {id} in ===> routs > web.php

        Route::delete('/idea/{id}',[ IdeaController::class ,'destroy'])->name('idea.destroy');

        */
        return redirect()->route('dashboard')->with('deleted', 'Idea deleted Successfully !!!');  // explained above.
        //___________________________________________________________________________________________________________________
    }


    public function show(idea $idea){
        // Moderen compact method_____________________________________|
        return view('shaired.idea-show', compact('idea'));

        /* conventional method_____________________________________|
           return view('shaired.idea-show',[
           'idea' => $idea                          // compact can only be used when BOTH NAMES ARE SAME('idea' => $idea).
           ]);
           ___________________________________________________________________________________________________________________
        */
    }
    public function edit(idea $idea){
        $editing =true;
        // $editing LARAVEL DEFAULT VAR = true and inside (idea-card.b.p) we use  @if ($editing ?? false)

        // Moderen compact method_____________________________________|
        return view('shaired.idea-show', compact('idea','editing'));
        //                                                 ^^^^
        //                 sending $edition hear __________||||
        //  {{{{same as}}}}    ===>   [[public function show(idea $idea)]] ^^^

    }
    public function update(idea $idea){
        request()->validate(['content' => 'required | min:3 | max:240']);
        $idea->content= request()->get('content','') ;
        $idea->save();

        // $editing LARAVEL DEFAULT VAR = true
        // Moderen compact method_____________________________________|
        return redirect()->route('idea.update',$idea->id)->with('success','Idea Updated Successfully !!!');
        //                                                 ^^^^
        //                 sending $edition hear __________||||
        //  {{{{same as}}}}    ===>   [[public function show(idea $idea)]] ^^^

    }
}
