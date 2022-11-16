<!-- Item B Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item_b_id', 'Item B Id:') !!}
    {!! Form::text('item_b_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Approved Field -->
<div class="form-group col-sm-12">
    {!! Form::label('approved', 'Approved:') !!}
    {!! Form::text('approved', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.requestAproved.requestAproveds.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
