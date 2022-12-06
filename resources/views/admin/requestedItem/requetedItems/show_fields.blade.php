<!-- Id Field -->
{{-- {!! $requetedItem !!} --}}

<table class="table table-hover">
    <thead>
        <th>
           Item  
        </th>   
        <th>
            Borrowed Room 
        </th>
        <th>
            unit
        </th> 
        <th>
            quantity
        </th>  
        <th>
            created date
        </th>
        <th>
            Action
        </th> 
    <thead>
            
   @foreach ($requetedItem as $item)
   <tr>
        <td>{!! $item->name_il !!}</td>
        <td>{!! $item->room_b !!}</td>
        <td>{!! $item->quantity_b !!}</td>
        <td>{!! $item->name_iu !!}</td>
        <td>{!! $item->created_at !!}</td>
      
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

  </table>



{{-- 
<div class="form-group">
    @if (Sentinel::inRole('headofstore'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}


    
@endif

    
</div>
<div class="form-group">
    <div class="row">
       
        @if (Sentinel::inRole('department'))
        {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
        <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                       <input class="form-control" name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                      
                           {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
    
                           
       
        @endif
    
    </div>
    
</div>
<div class="form-group">
    @if (Sentinel::inRole('storekeeper'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>
<div class="form-group">
    @if (Sentinel::inRole('fixed'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>

<div class="form-group">
    @if (Sentinel::inRole('consumable'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>

<div class="form-group">
    @if (Sentinel::inRole('datamanager'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    <i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Aprove"></i>
                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div> --}}
