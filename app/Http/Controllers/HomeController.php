<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

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
     * @return Sale[]|\Illuminate\Contracts\View\Factory|\Illuminate\Database\Eloquent\Collection|\Illuminate\View\View
     */
    public function index()
    {
        $sales = Sale::selectRaw('sum(expenses) expenses, 
                    sum(profit) profit,
                    sale_year')
            ->groupBY('sale_year')->get();


        if(\request()->expectsJson()){
            return $sales;
        }
        return view('home');
    }
}
