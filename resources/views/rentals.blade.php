@extends('layouts.app')
@section('content')
        <div id="wrapper">
        <div class ="accessibleFeature">
            <h3  id="stocks"> Add Rental: </h3>
            <div id="add">
                <form action='{{ route("rents.add") }}'method="POST">
                @csrf
                <table class="table table-borderless">
                <tbody><tr>
                <td><h6>Game:</h6><select value ="" name ="idInventory" >
                    <option value = "1"> None </option>
                </select></td>
                <td><h6>Member ID:</h6><input class = "input" type="number" value ="" name ="idUser" /></td>
                <td><h6>Days:</h6><input class = "input" type="number" value ="" name ="period" /></td>
                </tr>
               
                <tr>
                <td id="lessThanThree"><input class = "input" type="reset" value="Reset" />
                <input  class = "input" type ="submit" value ="Add" /></td>
                </tr>
                </tbody>
                </table>
                </form>
            </div>
            <h3 id="stocks"> Rentals:</h3>
            <input id = "search" type="text" placeholder="Search...." style ="width: 100%; margin-top: 10px;" onkeyup ="filterTable()"/>
            <div id ="records" style="max-height: 500px; overflow-y: scroll; overflow-x: hidden;"> 
                    <table id ="table1" class ="table table-bordered">
                    <thead class ="head">
                        <tr>
                        <th >Rent ID:</th>
                        <th >Date Rented:</th>
                        <th >Due Date:</th>
                        <!-- Swapnil - No need for date returned-->
                        <th >Date Returned:</th>
                        <th >Extra Extension:</th>
                        <th >Game ID:</th>
                        <th >Member ID:</th>
                        <th >Give Extension:</th>
                        </tr>
                    </thead>
                    </table>
            </div>
        </div>
        <div class="footer">
            <p style="padding-top: 40px; padding-bottom: 40px; padding-left: 12px; font-size: 15px;"> <strong> &copy Copyright David Mahgerefteh, Mandu Shi, Swapnil Paul, Stoyan Binev </strong> </p>
            <img src="joystick.png" width="100" height="100" style="margin-left: 90%; margin-top: -9%" />
        </div>
        </div>

        <script>
            function filterTable(){
                var tr, tbody, input, td, filter;
                input = document.getElementById("search");
                filter = input.value.toLowerCase();
                tbody = document.getElementById("data");
                tr = tbody.getElementsByTagName("tr");
                for(i =0; i < tr.length; i++){
                    td = tr[i].getElementsByTagName("td")[0];
                    if(td){
                    if(td.innerHTML.toLowerCase().indexOf(filter) > -1)
                        tr[i].style.display = "";
                    else
                        tr[i].style.display = "none";
                    }
                }
            }
        </script>
@endsection
