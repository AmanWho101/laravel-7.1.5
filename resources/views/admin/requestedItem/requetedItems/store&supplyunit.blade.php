<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
  <style>
   
  </style>
</head>
<body>
    <div class="container">
        <div class="card">
<div class="card-header">
 
<h4>To store and supply unit</h4>
<h5>Request the following items for the use</h5>
</div>
<div class="card-body">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item type</th>
            <th scope="col">Unit</th>
            <th scope="col">Quantity</th>
            
            <th scope="col">Room</th>
           
           
          </tr>
        </thead>
        <tbody>
         
            @foreach ($printItem as $item)
            <tr>
              
              <th scope="row">1</th>
              <td>{!! $item->name_il !!}</td>
              <td>{!! $item->name_iu !!}</td>
              <td>{!! $item->quantity_b !!}</td>
              
              <td>{!! $item->room_b !!}</td>
              
             
            </tr>
            @endforeach
            
          
        </tbody>
      </table>
</div>
<div class="card-footer">
    <div class="container">
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <p>to be filed by store keeper</p>
                <label>receipt S.N</label> 
                <input type="text" class="form-control  " >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>requested by</label> 
                <input type="text" class="form-control col-md-9" value="{!! $printItem->first()->first_name,', ',$printItem->first()->last_name !!}" readonly>
            </div>
            <div class="form-group">
                <label>Head Approved</label> 
                @if (!is_null($printItem->first()->w_approve))
                <input type="text" class="form-control col-md-9 " value="tadese or worku" readonly>
                    
                @else
                <input type="text" class="form-control " value="not approved" readonly>
                @endif
                
            </div>
        </div>
            
       
        
    </div>
    <div class="form-group" >
        <label>Approved Head of store and supplier team </label> 
        <input type="text" class="form-control col-md-6" style="justify-content: center;" value="" readonly>
    </div>
    </div>
    
</div>
        </div>
    </div>
    
</body>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<script type="text/javascript">

$(document).ready(function () {
  window.print();

setTimeout(function () { 
window.open('http://localhost:8000/admin/requestedItem/requetedItems', '_blank');
window.close();
}, 1000);

       
});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</html>