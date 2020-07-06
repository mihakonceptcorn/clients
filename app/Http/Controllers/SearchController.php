<?php

namespace App\Http\Controllers;

use App\Components\ClientsSearch\ClientsSearch;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\RedirectResponse;
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
     * @param SearchRequest $request
     * @return RedirectResponse|View
     */
    public function getResults(SearchRequest $request)
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
