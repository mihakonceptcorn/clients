(function() {
    let clientsTable = document.querySelector('[js-data-table]');
    if (clientsTable) {
        clientsTable.addEventListener('click', function(event) {
            if (!event.target.matches('[js-data-destroy]')) return
            let areUouSure = confirm("Are you sure you want to delete the client?");
            if (!areUouSure) {
                event.preventDefault();
            }
        });
    }
}());
