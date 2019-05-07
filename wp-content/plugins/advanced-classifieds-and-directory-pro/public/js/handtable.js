$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": {
            "url": ACADP.ajaxurl,
            "dataSrc": "demo"
        },
        "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    } );
} );