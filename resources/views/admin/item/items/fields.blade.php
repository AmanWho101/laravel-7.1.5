<!-- Store Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('store_id', 'Store:') !!}
    @if (isset($store))
    <select name="store_id" id="store_id" class="form-control">
        @foreach ($store as $stores)
            <option value="{{$stores->id}}">{{$stores->type}}</option>
        @endforeach
    </select>
    @endif
    @if (isset($store_id))
    {!! Form::number('store_id', null, ['class' => 'form-control']) !!}
    @endif
    {{-- {!! Form::number('store_id', null, ['class' => 'form-control']) !!} --}}
   
</div>

<!-- Item List Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_list_id', 'Item List:') !!}
    {{-- {!! Form::number('item_list_id', null, ['class' => 'form-control']) !!} --}}
    @if (isset($item_list_id))
    {!! Form::number('item_list_id', null, ['class' => 'form-control']) !!}
    @endif
    @if (isset($iteml))
    <select name="item_list_id" id="item_list_id" class="form-control">
        @foreach ($iteml as $iteml)
            <option value="{{$iteml->id}}">{{$iteml->name_il}}</option>
        @endforeach
    </select>    
    @endif
    
</div>

<!-- Item Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_category_id', 'Item Category:') !!}
    {{-- {!! Form::number('item_category_id', null, ['class' => 'form-control']) !!} --}}
    @if (isset($item_category_id))
    {!! Form::number('item_category_id', null, ['class' => 'form-control']) !!}
    @endif
    @if (isset($itemc))
    <select name="item_category_id" id="item_category_id" class="form-control">
        @foreach ($itemc as $itemc)
            <option value="{{$itemc->id}}">{{$itemc->name_ic}}</option>
        @endforeach
    </select>    
    @endif
    
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Unit Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name_iu', 'Item Unit:') !!}
    {{-- {!! Form::number('item_unit_id', null, ['class' => 'form-control']) !!} --}}
    @if (isset($item))
    <select name="item_unit_id" id="item_unit_id" class="form-control">
        <option value="{!! collect($item)->first() !!}">{!! collect($item)->first()->type !!}</option>
    </select>  
    @endif
    @if (isset($itemu))
    <select name="item_unit_id" id="item_unit_id" class="form-control">
        @foreach ($itemu as $itemu)
            <option value="{{$itemu->id}}">{{$itemu->name_iu}}</option>
        @endforeach
    </select>    
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.item.items.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
