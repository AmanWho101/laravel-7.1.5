<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $returnedItem->first()->id !!}</p>
    <hr>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $returnedItem->first()->email!!}</p>
    <hr>
</div>

<!-- Item Id Field -->
<div class="form-group">
    {!! Form::label('item_id', 'Item Id:') !!}
    <p>{!! $returnedItem->first()->name_il !!}</p>
    <hr>
</div>
<div class="form-group">
    {!! Form::label('created_at', 'created_at:') !!}
    <p>{!! $returnedItem->first()->created_at !!}</p>
    <hr>
</div>

