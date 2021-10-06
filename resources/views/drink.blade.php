<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>

</head>
<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<table id="drink" class="display" width="100%"></table>

<script>


  $(document).ready(function() {

      $('#drink').DataTable( {
        ajax: {
          url: '/api/drink',
          method: "GET",
        },
          columns: [
              { title: 'id', data: "id" },
              { title: 'drink', data: "drink" },
              { title: 'description', data: "description" },
          ]
      } );
  } );
</script>
</body>
</html>
