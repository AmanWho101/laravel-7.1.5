<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! collect($item)->first()->id !!}</p>
    <hr>
</div>

<!-- Store Id Field -->
<div class="form-group">
    {!! Form::label('store_id', 'Store Id:') !!}
    <p>{!! collect($item)->first()->type !!}</p>
    <hr>
</div>

<!-- Item List Id Field -->
<div class="form-group">
    {!! Form::label('item_list_id', 'Item List Id:') !!}
    <p>{!! collect($item)->first()->name_il !!}</p>
    
    <hr>
</div>

<!-- Item Category Id Field -->
<div class="form-group">
    {!! Form::label('item_category_id', 'Item Category Id:') !!}
    <p>{!! collect($item)->first()->name_ic !!}</p>
    <hr>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! collect($item)->first()->quantity !!}</p>
    <hr>
</div>

<!-- Item Unit Id Field -->
<div class="form-group">
    {!! Form::label('item_unit_id', 'Item Unit Id:') !!}
    <p>{!! collect($item)->first()->name_iu !!}</p>
    <hr>
</div>

