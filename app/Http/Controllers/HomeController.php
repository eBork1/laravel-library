<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Array of all rows from the books table
        $myArr = \DB::table('books')->get();
        for ($i = 0; $i < count($myArr); $i++) {
            // Getting all rows WHERE book_id EQUALS the id of a specific row in the books table ($myArr)
            $checkedOutBookArr = \DB::table('checkouts')->where('book_id', '=', $myArr[$i]->id)->get();
            $myArr[$i]->{"checkedout"} = count($checkedOutBookArr);
        }

        return view('home', [
            'books' => $myArr
        ]);
    }

    public function checkOut(Request $request)
    {
        \DB::table('checkouts')->insert(['checked_by' => Auth::User()->id, 'book_id' => $request->book_id]);
        return redirect('/home');
    }
}
