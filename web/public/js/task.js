$(document).ready(function () {
    var options = {
        paging: false,
        searching: false,
        info: false,
        order: [[ 1, "desc" ]],
    };

    $('.task-words').DataTable(options);
    $('.task-domain').DataTable(options);
});