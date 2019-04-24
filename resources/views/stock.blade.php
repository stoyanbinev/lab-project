@extends('layouts.app')
@section('content')
        <div id="wrapper">
            <div class ="accessibleFeature">
                <h3> Add Game: </h3>
                <div id="add">
                    <form action='{{ route("inventory.add") }}'method="POST">
                    @csrf
                    <table class="table table-borderless" >
                    <tr>
                    <td><h6>Game Name:</h6><input class = "input" type="text" value ="" name ="tile" /></td>
                    <td><h6>Release Year:</h6><input class="input" type="number" name ="releaseYear" min="1900" max="2099" step="1" value="2016" /></td>

                    <td><h6>Company:</h6><input class = "input" type="text" name="company" /></td>
                    <td><h6>Image:</h6><input class = "input" type="text" name="image"/></td>
                    </tr>
                    <tr>
                    <td><h6>Rating (out of 10):</h6><select class = "input" value ="" name ="rating"> 
                        <!--Get from database, add a constraint to prevent empty selection--> 
                        <option value = "0"> 0 </option>
                        <option value = "1"> 1 </option>
                        <option value = "2"> 2 </option>
                        <option value = "3"> 3</option>
                        <option value = "4"> 4</option>
                        <option value = "5">5</option>
                        <option value = "6"> 6</option>
                        <option value = "7"> 7</option>
                        <option value = "8"> 8 </option>
                        <option value = "9"> 9</option>
                        <option value = "10"> 10 </option>
                    </select></td>
                    <td><h6>Platform:</h6><select class = "input" value ="" name ="idPlatform"> 
                        <!--Get from database, add a constraint to prevent empty selection--> 
                        <option value = "1"> None </option>
                        
                    </select></td>
                    <td><h6>Genre:</h6><select class = "input" value ="" name ="idCategory"> 
                        <!--Get from database, add a constraint to prevent empty selection--> 
                        <option value = "1"> None </option>
                        
                    </select></td>
                    <td><h6>Media Type:</h6><select class = "input" value ="" name ="idCollectionType"> 
                        <!--Get from database, add a constraint to prevent empty selection--> 
                        <option value = "1"> None </option>
                        
                    </select></td>
                    </tr>
                    
                    <tr>
                    <td id ="moreThanThree"><input  id ="sub" type="reset" value="Reset" />
                    <input   id ="sub" type ="submit" value ="Add"/></td>
                    </tr>
                    </table>
                    </form>
                
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
