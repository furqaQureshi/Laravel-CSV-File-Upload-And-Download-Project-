<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <style>
.main {
    width: 90%;
    margin: 50px auto;
    display: flex;
}
.main input{
    overflow: hidden;
    opacity: 1;	
    height: 50px;
    border-top-style: hidden;
  border-right-style: hidden;
  border-left-style: hidden;
  border-bottom-style: groove;
  background-color: #eee;
}
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #1e74ad; 
    /* background: #131111; */
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		position: absolute;
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
      </style>
    
    
    <div class="container w-50">
   <div class="main">
  <div class="input-group">
    <input type="text" class="form-control" id="myInput" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-success" type="button" onclick="myFunction()">
        <span>Search</span>
      </button>
    </div>
  </div>
  </div>
  <table id="myTable">
    <thead>
      <tr>
        <th>User Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-column="First Name">James</td>
        <td data-column="Last Name">Matman</td>
        <td data-column="Job Title">Chief Sandwich Eater</td>
        <td data-column="Twitter">@james</td>
      </tr>
    </tbody>
  </table>
    </div>
</body>
<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>
    
</html>