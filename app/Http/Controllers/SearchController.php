<?php

namespace App\Http\Controllers;

use App\Components\ClientsSearch\ClientsSearch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * @var ClientsSearch
     */
    private $clientsSearch;

    /**
     * SearchController constructor.
     * @param ClientsSearch $clientsSearch
     */
    public function __construct(ClientsSearch $clientsSearch)
    {
        $this->clientsSearch = $clientsSearch;
    }

    /**
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function getResults(Request $request)
    {
        $query = $request->get('query');
        if (!$query) {
            return redirect()->route('index');
        }

        $searchResult = $this->clientsSearch->search($query);
        $clients = $searchResult->getClients();
        $searchSource = $searchResult->getSearchSource();
        $paginate = false;

        return view('index', compact('clients', 'paginate', 'searchSource'));
    }
}
