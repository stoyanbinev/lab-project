@extends('layouts.app')

@section('content')
        <div>
        <div class ="accessibleFeature">
            <h3  id="stocks"> Change Rule: </h3>
            <div id="change">
                <form action ="rules.php" method ="post">
                <table class="table table-borderless">
                <tr>
                <td><h6>Rent Period (weeks):</h6><input class ="input" type="number" value ="" name ="rentP" /></td>
                <td><h6>Extension per Rent:</h6><input class ="input" type="number" value ="" name ="extensionNo" /></td>
                <td><h6>Extension Period (weeks):</h6><input class ="input" type="number" value ="" name ="extensionP"/></td>
                <td><h6>Violation Period (months):</h6><input class ="input" type="number" value ="" name ="violP" /></td> 
                </tr>
                <tr>
                <td><h6>Rent Number:</h6><input class ="input" type="number" value ="" name ="rentNo" /></td>
                <td><h6>Ban Period (months):</h6><input class ="input" type="number" value ="" name ="banP" /></td>
                <td><h6>Number of Violations:</h6><input class ="input" type="number" value ="" name ="violNo" /></td>  
                </tr>
                <tr>
                    <td id= "moreThanThree">
                        <input type="reset" value="Reset" />
                        <input type ="submit" value ="Update" />
                    </td>
                </tr>
                </table>
                </form>
            </div>
            <h3  id="stocks"> Rules: </h3>
            <div id ="rules"> 
                <table id ="table5" class= "table table-bordered" style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;">
                <thead>
                    <tr>
                    
                    <th >Rent Period (weeks):</th>
                    <th >Extension per Rent:</th>
                    <th >Extension Period (weeks):</th>
                    <th >Rent Number:</th>
                    <th >Ban Period (months):</th>
                    <th >Number of Violation:</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     
                    <td >{{{$rules->rentPeriod}}}</td>
                    <td >{{{$rules->extensionNumber}}}</td>
                    <td >{{{$rules->extensionPeriod}}}</td>
                    <td >{{{$rules->rentNumber}}}</td>
                    <td >{{{$rules->banPeriod}}}</td>
                    <td >{{{$rules->itmNotReturned}}}</td>
                    
                    </tr>
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
