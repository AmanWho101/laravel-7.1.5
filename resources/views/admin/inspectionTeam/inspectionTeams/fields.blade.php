<!-- Name Field -->
<div class="row">
    
<div class="form-group col-sm-6">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::text('department', 'ASTU', ['readonly','class' => 'form-control']) !!}
</div>
<div class="container col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('item_no', 'Item No In expenditure Registry:') !!}
        {!! Form::text('item_n_r', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('No.of', 'No of entry in register of incoming goods:') !!}
        {!! Form::text('entry_no', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'classiffication of stock:') !!}
        {!! Form::text('stok', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'store No:') !!}
        {!! Form::text('stor_no', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'shelf No:') !!}
        {!! Form::text('shelf_no', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Reciver: ') !!}
        {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
        <select name="reciver" id="reciver" class="form-control">
            @foreach ($user as $unitb)
                <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
            @endforeach
        </select>
    </div>


<div class="form-group col-sm-6">
    {!! Form::label('name', 'Recieved From:') !!}
    <select name="reciver_from" id="reciver_from" class="form-control">
        @foreach ($user as $unitb)
            <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
        @endforeach
    </select>
    
</div>
</div>
<div class="container col-sm-12">
    <div class="row">
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'Discription of The Item:') !!}
            <select name="item_d" id="item_d" class="form-control">
                @foreach ($itemlist as $unitb)
                    <option value="{!! $unitb->id !!}">{!! $unitb->discription !!}</option>
                @endforeach
            </select>
            
           
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'Model:') !!}
            {!! Form::text('model', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'serial:') !!}
            {!! Form::text('serial', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-1">
            {!! Form::label('name', 'From:') !!}
            <select  name="r_from" id="r_from" class="form-control">
                @foreach ($user as $unitb)
                    <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
                @endforeach
            </select >
           
        </div>
        <div class="form-group col-sm-1">
            {!! Form::label('name', 'To:') !!}
            <select  name="d_to" id="d_to" class="form-control">
                @foreach ($user as $unitb)
                    <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
                @endforeach
            </select >
           
          
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'quantity:') !!}
            {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'Unit price:') !!}
            {!! Form::number('unit_p', null, ['class' => 'form-control']) !!}
        </div>
       
    </div>
    <div class="row">
        <div class="form-group col-sm-6 ">
            {!! Form::label('name', 'Donor:') !!}
            <select  name="doner" id="doner" class="form-control">
                @foreach ($user as $unitb)
                    <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
                @endforeach
            </select >
        </div>
        <div class="form-group col-sm-6 ">
            {!! Form::label('name', 'Recipient:') !!}
            <select name="recipient" id="recipient" class="form-control">
                @foreach ($user as $unitb)
                    <option value="{!! $unitb->id !!}">{!! $unitb->email!!}</option>
                @endforeach
            </select>
            
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-6 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.inspectionTeam.inspectionTeams.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
