<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
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
            
            
           
           
          </tr>
        </thead>
        <tbody>
         
            @foreach ($borrowedItem as $item)
            <tr>
              
              <th scope="row">1</th>
              <td>{!! $item->name_il !!}</td>
              <td>{!! $item->name_iu !!}</td>
              <td>{!! $item->quantity_b !!}</td>
              
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
                <input type="text" class="form-control col-md-9" value="{!! $borrowedItem->first()->first_name,', ',$borrowedItem->first()->last_name !!}" readonly>
            </div>
            <div class="form-group">
                <label>Head Approved</label> 
                @if (!is_null($borrowedItem->first()->w_approve))
                <input type="text" class="form-control col-md-9 " value="tadese or worku" readonly>
                    
                @else
                <input type="text" class="form-control " value="not approved" readonly>
                @endif
                
            </div>
        </div>
            
       
        
    </div>
    <div class="form-group" >
        <label>Approved Head of store and supplier team </label> 
        @if (!is_null($borrowedItem->first()->hos_approved))
        <input type="text" class="form-control col-md-6" style="justify-content: center;" value="Approved Head of store and supplier team" readonly>
                    
                @else
        <input type="text" class="form-control col-md-6" style="justify-content: center;" value="not approved" readonly>
                @endif
        
    </div>
    </div>
    
</div>
        </div>
    </div>
    
</body>

</html>