<?php

namespace App\Components\ClientsSearch\Model;

use Illuminate\Database\Eloquent\Collection;

class ClientsSearchResult
{
    /**
     * @var Collection
     */
    private $clients;

    /**
     * @var string
     */
    private $searchSource;

    /**
     * ClientsSearchResult constructor.
     * @param Collection $clients
     * @param string $searchSource
     */
    public function __construct(Collection $clients, $searchSource)
    {
        $this->clients = $clients;
        $this->searchSource = $searchSource;
    }

    /**
     * @return Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @return string
     */
    public function getSearchSource()
    {
        return $this->searchSource;
    }
}
