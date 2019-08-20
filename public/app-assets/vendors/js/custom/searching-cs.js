function filterGlobal () {
    $('#example').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

$(document).ready(function() {
    $('#example').DataTable({
        destroy: true,
        searching: true,
        info: true,
        "sDom": "l t p",
    });

    // l - Length changing
    // f - Filtering input
    // t - The table!
    // i - Information
    // p - Pagination
    // r - pRocessing

    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );

} );

