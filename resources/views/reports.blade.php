@extends('layouts.app')
@section('content')
        <div>
            <div class ="accessibleFeature">
                <h3 id="reports"> Report From System: </h3>
                <input id = "search" type="text" placeholder="Search...." style ="width: 100%; margin-top: 10px;" onkeyup ="filterTable()"/>
                <div id ="damages" style="max-height: 500px; overflow-y: scroll; overflow-x: hidden;"> 
                    <table id ="table4" class= "table table-bordered">
                    <thead>
                        <tr>
                        <th >Report ID:</th>
                        <th >Game ID:</th>
                        <th >Member ID:</th>
                        <th >Fee (£):</th>
                        <th >Refunded (£):</th>
                        <th >Info:</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="footer">
                    <p style="padding-top: 40px; padding-bottom: 40px; padding-left: 12px; font-size: 15px"> <strong> &copy Copyright David Mahgerefteh, Mandu Shi, Swapnil Paul, Stoyan Binev </strong> </p>
                    <img src="joystick.png" width="100" height="100" style="margin-left: 90%; margin-top: -9%" />
            </div>
        </div>
@endsection
