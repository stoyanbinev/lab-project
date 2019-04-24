@extends('layouts.app')

@section('content')

		
		<div class="container">
			<h1 style="text-align: center;font-family: Impact, Charcoal, sans-serif; font-size: 30px;" >{{{$item[0]->tile}}}</h1>
		</div>
		<div class="container" id = "description">
			<img class="center-block" src="rdr2ItemExample.jpeg" width="340" height="420" style="margin-bottom:30px; margin-top: 30px;">
			<p>{{{$item[0]->company}}}</p> 
		</div>
		<div class="container">
			<h2 style="text-align: center;font-family: Impact, Charcoal, sans-serif; font-size: 30px;" >Reviews</h2>
			<table class="table table-bordered table text-center">
				<thead>
					<tr>
						<th class="text-center">Outlet</th>
						<th class="text-center">Rating</th>
						<th class="text-center">Source</th>
					</tr>
				</thead>
			<tbody>
				<tr>
					<td>Users</a></td>
					<td>{{{$item[0]->rating}}}</td>
					<td><a href="https://uk.ign.com/games/red-dead-redemption-2">IGN RDR2 Review</td>
				</tr>
			</tbody>
            </table>
        </div>
  
    <footer style="background-color: lightgrey; min-height: 45px; margin-top: 70px; padding-bottom: 10px;">
        <p style="padding-top: 40px; padding-bottom: 40px; padding-left: 12px; font-size: 15px"> <strong> &copy Copyright David Mahgerefteh, Mandu Shi, Swapnil Paul, Stoyan Binev </strong> </p>
        <img src="joystick.png" width="100" height="100" style="margin-left: 90%; margin-top: -9%" />
    </footer>

@endsection