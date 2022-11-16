<!-- Name B Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name_b', 'Name B:') !!}
    {{-- {!! Form::number('name_b', null, ['class' => 'form-control']) !!}
     --}}
<select name="name_b" id="name_b" class="form-control">
    @foreach ($user as $users)
        <option value="{!! $users->id !!}">{!! $users->email!!}</option>
    @endforeach
</select>
</div>

<!-- Item B Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_b', 'Item B:') !!}
    {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
    <select name="item_b" id="item_b" class="form-control">
        @foreach ($item as $itemsb)
            <option value="{!! $itemsb->id !!}">{!! $itemsb->name_il!!}</option>
        @endforeach
    </select>
</div>
<!-- Item unit Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_unit', 'Item Unit: ') !!}
    {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
    <select name="item_u" id="item_u" class="form-control">
        @foreach ($unit as $unitb)
            <option value="{!! $unitb->id !!}">{!! $unitb->name_iu!!}</option>
        @endforeach
    </select>
</div>
<!-- Item unit Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_store', 'Item store: ') !!}
    {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
    <select name="item_s" id="item_s" class="form-control">
        @foreach ($store as $unitb)
            <option value="{!! $unitb->id !!}">{!! $unitb->type!!}</option>
        @endforeach
    </select>
</div>
<!-- Item cat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_category', 'Item Cattegory: ') !!}
    {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
    <select name="item_bc" id="item_bc" class="form-control">
        @foreach ($catitem as $unitb)
            <option value="{!! $unitb->id !!}">{!! $unitb->name_ic !!}</option>
        @endforeach
    </select>
</div>
<!-- quantity borowed -->
<div class="form-group col-sm-12">
    {!! Form::label('quantity_b', 'Quantity Borrowed:') !!}
    {!! Form::number('quantity_b', null, ['class' => 'form-control']) !!}
</div>
<!-- Room B Field -->
<div class="form-group col-sm-12">
    {!! Form::label('room_b', 'Room B:') !!}
    {!! Form::text('room_b', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.borrowedItem.borrowedItems.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
