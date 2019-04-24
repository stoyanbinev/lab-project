@extends('layouts.app')
@section('content')
        <div>
            <div class ="accessibleFeature">
                <h3 > Ban Member:</h3>
                <div id="banmember" >
                    <form action='{{ route("user.ban") }}'method="POST">
                    @csrf
                    <table class="table table-borderless">
                        
                        <tr>
                            <td><h6>Member ID:</h6><input type="text" value ="" name ="idUser" style = "width: 200px"/></td>
                        </tr>
                        
                        <tr>
                            <td><h6>Info:</h6><input type="text" value ="" name ="info" style = "width: 200px"/></td>
                        </tr>
                        <tr>
                            <td><input type="reset" value="Reset" />
                            <input type ="submit" value ="Add" /></td>
                        </tr>
                    </table>
                    </form>
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
