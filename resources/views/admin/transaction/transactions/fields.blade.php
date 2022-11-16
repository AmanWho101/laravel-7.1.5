<!-- Action Field -->
<div class="form-group col-sm-12">
    {!! Form::label('action', 'Action:') !!}
    {!! Form::text('action', null, ['class' => 'form-control']) !!}
</div>

<!-- R Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('r_name', 'R Name:') !!}
    {!! Form::text('r_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.transaction.transactions.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
