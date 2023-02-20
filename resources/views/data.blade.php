<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
  </head>
  <body>
    <style>
    </style>
    <div class="container-fluid">
      @if ((session()->has('message')))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success.... </strong> {{ session()->get('message'); }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="row my-4">
        <div class="col">
          <h1>Csv Data </h1>
        </div>
        <div class="col">
          <a href="{{ url('/') }}" class="btn btn-info float-right my-4">Upload CSV FIle</a>
        </div>
        <a href="{{ url('/csvFile') }}" class="btn btn-success float-right my-4 pl-4">CSV Download</a>
      </div>
      <table class="table container my-4 mt-4" id="example">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Address</th>
                <th scope="col">Primary Address</th>
                <th scope="col">secondary</th>
                <th scope="col">State</th>
                <th scope="col">zip</th>
                <th scope="col">Country</th>
                <th scope="col">Age Range</th>
                <th scope="col">Income Range</th>
                <th scope="col">Home Value Range</th>
                <th scope="col">Owns A Home</th>              
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->f_name }}</td>
                <td>{{ $user->l_name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->primary_address }}</td>
                <td>{{ $user->secondary }}</td>
                <td>{{ $user->state }}</td>
                <td>{{ $user->zip }}</td>
                <td>{{ $user->county }}</td>
                <td>{{ $user->age_range }}</td>
                <td>{{ $user->income_range }}</td>
                <td>{{ $user->home_value_range }}</td>
                <td>{{ $user->owns_a_home }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>


</html>