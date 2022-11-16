<!-- Item Tot Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_tot', 'Item Tot:') !!}
    {!! Form::number('item_tot', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Lef Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_lef', 'Item Lef:') !!}
    {!! Form::number('item_lef', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Lis Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_lis', 'Item Lis:') !!}
    {!! Form::number('item_lis', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.invertory.inventories.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
