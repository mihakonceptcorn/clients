<?php

namespace App\Components\ClientsSearch;

use App\Client;
use App\Components\ClientsSearch\Model\ClientsSearchResult;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ClientsSearch
{
    private const CACHE_DURATION = 'PT10M';
    private const SEARCH_LIMIT = 10;
    private const CACHE_PREFIX = 'search_';

    /**
     * @param $query
     * @return ClientsSearchResult
     */
    public function search($query)
    {
        $key = self::CACHE_PREFIX . $query;

        if (Cache::has($key)) {
            $clients = Cache::get($key);
            $searchSource = 'Result from cache';
        } else {
            $clients = Client::where(DB::raw("CONCAT(name, ' ', surname)"),
                    'LIKE', "%{$query}%")
                ->orWhere(DB::raw("CONCAT(surname, ' ', name)"),
                    'LIKE', "%{$query}%")
                ->limit(self::SEARCH_LIMIT)
                ->get();
            $searchSource = 'Result from database';
            if (!empty($clients)) {
                Cache::add($key, $clients, new \DateInterval(self::CACHE_DURATION));
            }
        }

        return new ClientsSearchResult($clients, $searchSource);
    }
}
