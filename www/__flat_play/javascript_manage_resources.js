// deze voor print_manage_resources
// serial =6
    $('#table_id_manage_resource').DataTable( {
        //"stateSave": true,
		//"stateDuration": 60 * 60 * 24, // one day
		"responsive": {
            "details": {
                "type": 'column'
                //"type": 'inline'
            }
        },
		
		"columnDefs": [
            {
                //"targets": [ 1,6,7,8,9,10,17,18],
                "visible": false,
                "searchable": true,
				"className": 'control',
				"orderable": false,
				"targets":   0
            }
        ],
		"order": [ 1, 'asc' ]
    } );
		
});
