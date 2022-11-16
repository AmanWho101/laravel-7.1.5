<!-- Action Field -->
<div class="form-group col-sm-12">
    {!! Form::label('action', 'Action:') !!}
    {!! Form::text('action', null, ['class' => 'form-control']) !!}
</div>

<!-- T Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('t_name', 'T Name:') !!}
    {!! Form::text('t_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.transactionHistory.transactionsHistories.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
