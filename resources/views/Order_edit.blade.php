@extends('layouts.app')

@section('head')

<link href="{{ asset('css/signin.css')}}" rel="stylesheet">
  <style>
    table,th,td {
      border: 1px solid black;    
    }
  </style>

@endsection

@section('title')

  <title>Shopping | Order/Edit</title>
  
@endsection

@section('content')
<h1 class="display-4 text-center mb-4 text-light">ORDER</h1>
 

      <div class="container">
        <div class="col-md-12">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header bg-dark">Edit Order</h5>
            <div class="card-body">
              <center>
                <table>
                  @foreach($or as $aaa)
                  <tr>
                    <td style="background-color: black;color: white;" width="12% width=" 12%" height="50">
                      <center>OrderNumber</center>
                    </td>
                    <td width="40% height=" 50">
                      <center>{{$aaa->orderNumber}}</center>
                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: black;color: white;" height="50">
                      <center>OrderDate</center>
                    </td>
                    <td height="50">
                      <center>{{$aaa->orderDate}}</center>
                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: black;color: white;" height="50">
                      <center>RequiredDate</center>
                    </td>
                    <td height="50">
                      <center>{{$aaa->requiredDate}}</center>
                    </td>
                  </tr>
                  @foreach($cus as $bbb)
                  @if($aaa->customerNumber == $bbb->customerNumber)
                  <tr>
                    <td style="background-color: black;color: white;" height="50">
                      <center>FirstName</center>
                    </td>
                    <td height="50">
                      <center>{{$bbb->contactFirstName}}</center>
                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: black;color: white;" height="50">
                      <center>LastName</center>
                    </td>
                    <td height="50">
                      <center>{{$bbb->contactLastName}}</center>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  <form action="update/{{$aaa->orderNumber}}" method="post" >
                  {{ method_field('put') }}
                  {{ csrf_field() }}
                    <tr>
                      <td style="background-color: black;color: white;" height="50">
                        <center>ShippedDate</center>
                      </td>
                      <td>
                        <center><input type="date" name="shippedDate" value={{$aaa->shippedDate}}></center>
                      </td>
                    </tr>
                    <tr>
                      <td style="background-color: black;color: white;" height="50">
                        <center>Status</center>
                      </td>
                      <td>
                        <center>
                          @if($aaa->status == "Cancelled")
                          <select name="status">
                            <option value="Cancelled" selected>Cancelled</option>
                            <option value="Disputed">Disputed</option>
                            <option value="In Process">In Process</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Shipped">Shipped</option>
                          </select>
                          @elseif($aaa->status == "Disputed")
                          <select name="status">
                            <option value="Cancelled">Cancelled</option>
                            <option value="Disputed" selected>Disputed</option>
                            <option value="In Process">In Process</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Shipped">Shipped</option>
                          </select>
                          @elseif($aaa->status == "In Process")
                          <select name="status">
                            <option value="Cancelled">Cancelled</option>
                            <option value="Disputed">Disputed</option>
                            <option value="In Process" selected>In Process</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Shipped">Shipped</option>
                          </select>
                          @elseif($aaa->status == "On Hold")
                          <select name="status">
                            <option value="Cancelled">Cancelled</option>
                            <option value="Disputed">Disputed</option>
                            <option value="In Process">In Process</option>
                            <option value="On Hold" selected>On Hold</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Shipped">Shipped</option>
                          </select>
                          @elseif($aaa->status == "Resolved")
                          <select name="status">
                            <option value="Cancelled">Cancelled</option>
                            <option value="Disputed">Disputed</option>
                            <option value="In Process">In Process</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Resolved" selected>Resolved</option>
                            <option value="Shipped">Shipped</option>
                          </select>
                          @else
                          <select name="status">
                            <option value="Cancelled">Cancelled</option>
                            <option value="Disputed">Disputed</option>
                            <option value="In Process">In Process</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Shipped" selected>Shipped</option>
                          </select>
                          @endif
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td style="background-color: black;color: white;" height="50">
                        <center>Comment</center>
                      </td>
                      <td>
                        <center><textarea rows="3" cols="60" name="comments">{{$aaa->comments}}</textarea></center>
                      </td>
                    </tr>
                    <tr>
                      <td style="background-color: black;color: white;" height="50">
                        <center>Confirm</center>
                      </td>
                      <td>
                        <center><input type="submit" onclick="success()" value="Confirm"></center>
                      </td>
                    </tr>
                  </form>
                  @endforeach
                </table>
              </center>
              <a href="/admin/orders"><img src="/img/left-arrow.svg" width="18px" class="my-3"><font color="black">BACK<font></a> 
            </div>

          </div>

@endsection

@section('script')
          <!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="{{ asset('js/app.js') }}" defer></script>
          <script>
            function success(){
              alert("Success !!!");
            }
          </script>
          <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

</html>