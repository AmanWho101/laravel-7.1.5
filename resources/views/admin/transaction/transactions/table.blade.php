
    <thead>
     <tr>
        <th>Action</th>
        <th>Requester Name</th>
        <th>item type</th>
        <th>item name</th>
        <th>Store Type</th>
        <th>quantity</th>
        
        <th >Requested Date</th>
     </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
   
        <tr>
            <td>Requested</td>
            <td>{!! $transaction->first_name,',',$transaction->last_name !!}</td>
            <td>{!! $transaction->name_ic !!}</td>
            <td>{!! $transaction->name_il !!}</td>
            <td>{!! $transaction->type !!}</td>
            <td>{!! $transaction->quantity_b !!}</td>
            <td>{!! $transaction->created_at !!}</td>
             
{{--            
             
            <td>
                 <a href="{{ route('admin.transaction.transactions.show', collect($transaction)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view transaction"></i>
                 </a>
                 <a href="{{ route('admin.transaction.transactions.edit', collect($transaction)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit transaction"></i>
                 </a>
                 <a href="{{ route('admin.transaction.transactions.confirm-delete', collect($transaction)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.transaction.transactions.delete', collect($transaction)->first() ) }}">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete transaction"></i>

                 </a>
            </td> --}}
        </tr>
    @endforeach
    </tbody>
