<!-- Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Discription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('discription', 'Discription:') !!}
    {!! Form::text('discription', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.store.stores.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
