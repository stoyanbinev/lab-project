@extends('layouts.app')

@section('content')
 

		<div class="container" >
			<h2 style="text-align: center;font-family: Impact, Charcoal, sans-serif; font-size: 30px;">Games in Stock</h2>
            <p style="text-align: center; font-size: 14px">
                Below is a list of games that you are able to currently rent out.</p>            
			<input class="form-control" id="myInput" type="text" placeholder="Search for games..">
            <div style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
			    <table class="table table-bordered table"  style = "text-align: center"id = "table1">
				<thead>
					<tr>
						<th style = "text-align: center">Title</th>
						<th style = "text-align: center">Genre</th>
						<th style = "text-align: center">Platform</th>
						<th style = "text-align: center">Release Year</th>
						<th style = "text-align: center">Media Type</th>
						<th style = "text-align: center">Currently Available</th>
					</tr>
				</thead>
			    <tbody id="myTable">
                    
                    @foreach($items as $item)
                        <tr>
                        <td>{{{$item->tile}}}</td>
                        <td>{{{$item->idCategory}}}</td>
                        <td>{{{$item->idPlatform}}}</td>
                        <td>{{{$item->releaseYear}}}</td>
                        <td>{{{$item->company}}}</td>
                        <td>{{{$item->rentStatus}}}</td>
                        </tr>

                    
                    @endforeach
				
			    </tbody>
                </table>
            </div>
        </div>
        
		<div class="container">
			<h2 style="text-align: center;font-family: Impact, Charcoal, sans-serif; font-size: 30px;" >Games Not in Stock</h2>
			<p style="text-align: center; font-size: 14px">
                Below is a list of games currently rented out by other members.</p>       
			<input class="form-control" id="myInput2" type="text" placeholder="Search for games..">
            <div style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
			    <table class="table table-bordered table" style = "text-align: center" id = "table2">
                    <thead >
                        <tr>
                            <th style = "text-align: center">Title</th>
                            <th style = "text-align: center">Genre</th>						
                            <th style = "text-align: center">Platform</th>
                            <th style = "text-align: center">Release Year</th>
                            <th style = "text-align: center">Media Type</th>
                            <th style = "text-align: center">Due Date</th>
                        </tr>
                    </thead>
                    <tbody id="myTable2">
                        @foreach($items as $item)
                        <tr>
                        <td>{{{$item->tile}}}</td>
                        <td>{{{$item->idCategory}}}</td>
                        <td>{{{$item->idPlatform}}}</td>
                        <td>{{{$item->releaseYear}}}</td>
                        <td>{{{$item->company}}}</td>
                        <td>{{{$item->rentStatus}}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer style="background-color: lightgrey;  ">
        <p style="padding-top: 40px; padding-bottom: 40px; padding-left: 12px; font-size: 15px"> <strong> &copy Copyright David Mahgerefteh, Mandu Shi, Swapnil Paul, Stoyan Binev </strong> </p>
        <img src="joystick.png" width="100" height="100" style="margin-left: 90%; margin-top: -9%" />
        </footer>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myInput2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
