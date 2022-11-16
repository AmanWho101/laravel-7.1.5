<!-- Item B Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_b', 'Item B:') !!}
    {!! Form::number('item_b', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.requestedItem.requetedItems.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
