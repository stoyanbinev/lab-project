@extends('layouts.app')
@section('content')
        <div id="wrapper">
            <div class ="accessibleFeature">
                <h3  id="members"> Add Member: </h3>
                <div id="add">
                    <form>
                    <table class="table table-borderless">
                    <tr>
                    <td><h6>First Name:</h6><input class = "input" type="text" value ="" name ="firstname" /></td>
                    <td><h6>Last Name:</h6><input class = "input" type="text" value ="" name ="lastname" /></td>
                    <td><h6>Date Of Birth:</h6><input class = "input" type="date" name ="dob" /></td>
                    </tr>
                    <tr>
                    <td><h6>Email:</h6><input class = "input" type="text" value ="" name ="email" /></td>
                    <td><h6>Phone:</h6><input class = "input" type="tel" value ="" name ="phone" /></td>
                    <td><h6>Type:</h6><select class = "input" name="type" >
                        <!--Double check with Swapnil -->
                                <option value = "student"> Student </option>
                                <option value = "volunteer"> Volunteer </option>
                                <option value = "secretary"> Secretary </option>  
                                </select></td>
                    </tr>
                    <tr>
                        <td id="lessThanThree"><input class = "input" type="reset" value="Reset" />
                    <input class = "input" type ="submit" value ="Add"/></td>
                    </tr>
                    </table>
                    </form>
                </div>
                <h3  id="members"> Members: </h3>
                <input id = "search" type="text" placeholder="Search...." style ="width: 100%; margin-top: 10px;" onkeyup ="filterTable()"/>
                <div id ="members"> 
                    <table id ="table3" class= "table table-bordered" style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;">
                    <thead>
                        <tr>
                        <th >Member ID:</th>
                        <th >Fist Name:</th>
                        <th >Last Name:</th>
                        <th >Date Of Birth:</th>
                        <th >Email:</th>
                        <th >Phone:</th>
                        <th >Type:</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        <!-- Read from database-->
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="footer">
                <p style="padding-top: 40px; padding-bottom: 40px; padding-left: 12px; font-size: 15px"> <strong> &copy Copyright David Mahgerefteh, Mandu Shi, Swapnil Paul, Stoyan Binev </strong> </p>
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
