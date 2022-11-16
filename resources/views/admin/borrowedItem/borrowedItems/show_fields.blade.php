<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! collect($borrowedItem)->first()->id !!}</p>
    <hr>
</div> --}}

<!-- Name B Field -->
<div class="form-group">
    {!! Form::label('name_b', 'Name B:') !!}
    <p>{!! collect($borrowedItem)->first()->email !!}</p>
    <hr>
</div>

<!-- Item B Field -->
<div class="form-group">
    {!! Form::label('item_b', 'Item B:') !!}
    <p>{!! collect($borrowedItem)->first()->name_il !!}</p>
    <hr>
</div>
<div class="form-group">
    {!! Form::label('quantity_b', 'Quantity Borrowed:') !!}
    <p>{!! collect($borrowedItem)->first()->quantity_b !!}</p>
    <hr>
</div>
<!-- Room B Field -->
<div class="form-group">
    {!! Form::label('room_b', 'Room B:') !!}
    <p>{!! collect($borrowedItem)->first()->room_b !!}</p>
    <hr>
</div>
<div class="form-group">
    {!! Form::label('created_at', 'Created_Date:') !!}
    <p>{!! collect($borrowedItem)->first()->created_at !!}</p>
    <hr>
</div>
