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
            
            
            <th scope="col">Action</th>
           
           
          </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
            @foreach ($requetedItem as $item)
            <tr>
              <th scope="row"><?php echo $i; $i++;?></th>
              <td>{!! $item->name_il !!}</td>
              <td>{!! $item->name_iu !!}</td>
         
              <td>{!! $item->room_b !!}</td>
              <td>
                <div class="form-group">
                    @if (Sentinel::inRole('headofstore'))
                    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                   <input name="approve" id="approve"  value="{!! $item->id !!}" hidden>        
                                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                                       {{ Form::close() }}
                                       @endif
                
                    
                </div>
                <div class="form-group">
                    <div class="row">
                       
                        @if (Sentinel::inRole('department'))
                        {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                        <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                       <input class="form-control" name="approve" id="approve"  value="{!! $item->id !!}" hidden>
                                      
                                           {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                        {{ Form::close() }}
                        @endif
                    
                    </div>
                    
                </div>
                <div class="form-group">
                    @if (Sentinel::inRole('storekeeper'))
                    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                   <input name="approve" id="approve"  value="{!! $item->id !!}" hidden>
                                  
                                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                                       {{ Form::close() }}          
                    @endif
                
                </div>
                <div class="form-group">
                    @if (Sentinel::inRole('fixed'))
                    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                   <input name="approve" id="approve"  value="{!! $item->id !!}" hidden>
                                  
                                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                                       {{ Form::close() }}             
                    @endif
                
                </div>
                
                <div class="form-group">
                    @if (Sentinel::inRole('consumable'))
                    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                   <input name="approve" id="approve"  value="{!! $item->id !!}" hidden>
                                  
                                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                                       {{ Form::close() }}           
                    @endif
                
                </div>
                
                <div class="form-group">
                    @if (Sentinel::inRole('datamanager'))
                    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
                    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                                   <input name="approve" id="approve"  value="{!! $item->id !!}" hidden>
                                  
                                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                                       {{ Form::close() }}              
                    @endif
                
                </div>
                </td>
             
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
                <input type="text" class="form-control col-md-9" value="{!! $requetedItem->first()->first_name,', ',$requetedItem->first()->last_name !!}" readonly>
            </div>
            <div class="form-group">
                <label>Head Approved</label> 
                @if (!is_null($requetedItem->first()->w_approve))
                <input type="text" class="form-control col-md-9 " value="tadese or worku" readonly>
                    
                @else
                <input type="text" class="form-control " value="not approved" readonly>
                @endif
                
            </div>
        </div>
            
       
        
    </div>
    <div class="form-group" >
        <label>Approved Head of store and supplier team </label> 
        @if (!is_null($requetedItem->first()->hos_approved))
                <input type="text" class="form-control col-md-6" style="justify-content: center;" value="Head Of Store" readonly>
                    
        @else
                <input type="text" class="form-control col-md-6" style="justify-content: center;" value="not approved" readonly>
        @endif
        
    </div>
    </div>
    
</div>
        </div>
    </div>
    
</body>
<head>
 
</head>

</html>