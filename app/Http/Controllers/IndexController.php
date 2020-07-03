<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $clients = Client::select()->latest()->paginate(10);
        $paginate = true;

        return view('index', compact('clients', 'paginate'));
    }
}
