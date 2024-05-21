<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = idea::orderBy('created_at', 'DESC');


        if (request()->has('search')) {

            // if (true) =  $ideas->where( filter ) ;

            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%' );

            //in SQL search * from id = id just like that.

            /*    in     ________________________________________________________________________________
                        | $ideas=$ideas->where('content','like','%' . request()->get('search','') . '%'); |
                        |----1----2--------3-------4-------5-----6--7---8---------9----10-----11--12-13---|

                |++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++|
                |    4.content              =  is the name of the database column.                                                   |
                |    5.like                 =  This is a SQL operator 'LIKE' operator search for a specified                         |
                |                               pattern in a column. (conjunction with wildcard characters.)                         |
                |    8.request()            =  Laravel helper function                                                               |
                |    9.->get('search', ''): =  value of the 'search' parameter from  query string of  HTTP request.                  |
                |                               If the 'search' parameter is not present, it defaults to an empty string ('').       |
                |    6,7,12,13              =  '%' . ... . '%':                                                                      |
                |                                                                                                                    |
                |        1.(percent) % = SQL wildcards that match zero or more characters.                                           |
                |        ( By surrounding the search term with %, you are performing a "contains" search,)                           |
                |                                                                                                                    |
                | MEANING:-  it will match ANY record where the "content" column includes the search term anywhere within its text.  |
                |____________________________________________________________________________________________________________________|
                */
        }


        return view('dashboard', ['ideas' => $ideas->paginate(5)]);





        // return view('dashboard', ['ideas' => idea::orderBy('created_at', 'DESC')->paginate(5) ]);
        /*

        ((((((((((((((((((((  E-X-P-L-I-N-A-T-I-O-N  ))))))))))))))))))))
        _________________________________________________________________________
       | hear idea===>                                                           |
       | (inside) app>Models>idea.php                                            |
       | we got protected idea $filable model with ({Content & Like} <=Filable)  |
       |                                                                         |
       |------------------------------  IMP  ------------------------------------|
       | 'ideas' featched from idea:: orderdBy creates_at ,DESENDING ORDER       |
       | + paginate(5-ideas per page...)                                         |
       |_________________________________________________________________________|

        (Cheaker Billow)
        _________________________________________________________
       | $idea = new idea([ 'content' => "Hello User", ]);       |
       | $idea->save();                                          |
       |                                                         |
       | ^^^^^^^^^^ this one is created to make automatic posts. |
       |                                                         |
       |   dump(idea::all());                                    |
       |    ^^^^ print all the databass connections              |
       |_________________________________________________________| */
    }



    // public function terms(){
    //     return view('data.terms');
    // }
    // public function about(){
    //     return view('data.about');
    // }


























    //  extras  =========================================================================================================================



    // public function initialIndex()
    // {
    //     $users = [                                                                  // suppose this data came from MySQL...
    //         ['name' => "Mukul", 'age' => 27, 'city' => 'nagpur'],
    //         ['name' => "Akhilesh", 'age' => 27, 'city' => 'Hydrabad'],
    //         ['name' => "Motu", 'age' => 25, 'city' => 'Mahal'],
    //         ['name' => "Kaiwalya", 'age' => 20, 'city' => 'Narsada'],
    //         ['name' => "Dikshant", 'age' => 16, 'city' => 'Dighori'],
    //     ];

    //     return view('initialDashboard', ['listUsers' => $users]);      // senond argument can be used to pass data inside that HTML...
    // }
}
