<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>

</head>
<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<p id="response"></p>

<table id="drink" class="display" width="100%"></table>

<script>


  $(document).ready(function() {

      var table = $('#drink').DataTable( {
        initComplete: function () {
            var api = this.api();
            var meta = api.ajax.json().meta;
            $('#max_consumed').val('maximum consumed ' + meta.max_consumed);
            $('#has_consumed').val('has consumed ' + meta.has_consumed);
        },
        ajax: {
          url: '/api/drink',
          method: "GET",

        },

          columns: [
              { title: 'drinks', data: 'drinks'},
              { title: 'id', data: "id", visible: 'false'},
              { title: 'drink', data: "drink" },
              { title: 'description', data: "description" },
              { title: 'servings', data: "servings"},
              { title: 'caffeine', data: "caffeine"},
              { title: 'size', data: 'size'},
              { title: 'consumed', data: "consumed"},
              { title: 'drink it'},
          ],
          "columnDefs": [ {
           "targets": -1,
           "order": [[ 1, "desc" ]],
           "defaultContent": "<button>Drink!</button>"
       } ]
      } );

      $('#drink tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var request = $.ajax({
              url: "/api/drink/" + data['id'],
              data: {drinks: 1},
              method: "PUT",
              dataType: "json",
              accepts: "application/json",
              success: function(data) {

                $('#max_consumed').val('maximum consumed ' + data.max_consumed);
                $('#has_consumed').val('has consumed ' + data.has_consumed);
                table.ajax.reload();
                if (data.message) {
                  alert('message: ' + data.message + ' on ' + data.consumed);
                }
              },
              error: function(data) {
                alert('Error on Drink');
              }
        });

    } );

  } );
</script>
<input id="has_consumed" value="">
<input id="max_consumed" value="">
</body>
</html>
