<!-- Id Field -->

<div class="form-group">
    {!! Form::label('Requested by', 'Requested By:') !!}
    <p>{!! collect($requetedItem)->first()->first_name,', ',collect($requetedItem)->first()->last_name !!}</p>
    <hr>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('requested item', 'Requested Item:') !!}
    <p>{!! collect($requetedItem)->first()->name_il !!}</p>
    <hr>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('Item Unit', 'Item Unit:') !!}
    <p>{!! collect($requetedItem)->first()->name_iu !!}</p>
    <hr>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('Quantity Item', 'Quantity Item:') !!}
    <p>{!! collect($requetedItem)->first()->quantity_b !!}</p>
    <hr>
</div>
<div class="form-group">
    {!! Form::label('room_b', 'room_b:') !!}
    <p>{!! collect($requetedItem)->first()->room_b !!}</p>
    <hr>
</div>
<div class="form-group">
    {!! Form::label('requested date', 'requested date:') !!}
    <p>{!! collect($requetedItem)->first()->created_at !!}</p>
    <hr>
</div>

<div class="form-group">
    @if (Sentinel::inRole('headofstore'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}

                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

    <h5>To be aproved by Store keeper</h5>
    
@endif

    
</div>
<div class="form-group">
    <div class="row">
       
        @if (Sentinel::inRole('department'))
        {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}
    
                       <input class="form-control" name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                      
                           {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
    
                           <h5>To be aproved by Store keeper</h5>
       
        @endif
    
    </div>
    
</div>
<div class="form-group">
    @if (Sentinel::inRole('storekeeper'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}

                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>
<div class="form-group">
    @if (Sentinel::inRole('fixed'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}

                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>

<div class="form-group">
    @if (Sentinel::inRole('consumable'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}

                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>

<div class="form-group">
    @if (Sentinel::inRole('datamanager'))
    {!! Form::open(['route' => 'admin.requestedItem.requetedItems.store']) !!}

                   <input name="approve" id="approve"  value="{!! collect($requetedItem)->first()->id !!}" hidden>
                  
                       {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                       
    @endif

</div>
