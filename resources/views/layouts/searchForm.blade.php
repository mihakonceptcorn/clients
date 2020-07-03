<div class="col-md-8 position-relative">
    <form method="GET" action="{{ route('search') }}" class="card p-2">
        <div class="input-group">
            <input type="search" name="query" class="form-control" placeholder="Search query">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </div>
    </form>
    @isset($searchSource)
        <div class="position-absolute text-success">{{ $searchSource }}</div>
    @endisset
</div>
