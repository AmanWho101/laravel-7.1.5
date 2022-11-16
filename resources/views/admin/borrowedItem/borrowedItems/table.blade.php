<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="borrowedItems-table" width="100%">
    <thead>
     <tr>
        <th>Name Borrowed</th>
        <th>Item Borrowed</th>
        <th>Quantity Borrowed</th>
        <th>Room Borrowed</th>
        <th>Room Date</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($borrowedItems as $borrowedItem)
        <tr>
       
            <td>{!! $borrowedItem->email !!}</td>
            <td>{!! $borrowedItem->name_il !!}</td>
            <td>{!! $borrowedItem->quantity_b !!}</td>
            <td>{!! $borrowedItem->room_b !!}</td>
            <td>{!! $borrowedItem->created_at !!}</td>
            <td>
                <div class="container">
                    <a href="{{ route('admin.borrowedItem.borrowedItems.show', collect($borrowedItem)->first() ) }}">
                        <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view borrowedItem">View</i>
                    </a>
                    {{-- <a href="{{ route('admin.borrowedItem.borrowedItems.edit', collect($borrowedItem)->first() ) }}">
                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit borrowedItem"></i>
                    {{-- </a> --}}
                    {{-- <a href="{{ route('admin.borrowedItem.borrowedItems.confirm-delete', collect($borrowedItem)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.borrowedItem.borrowedItems.delete', collect($borrowedItem)->first() ) }}">
                       <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view borrowedItem"></i>
                   </a> --}} 
                        {!! Form::open(['route' => 'admin.returnedItem.returnedItems.store']) !!}
                   <input name="itemid" id="itemid"  value="{!! collect($borrowedItem)->first() !!}" hidden>
                    <input name="user_id" id="user_id" value="{!! $borrowedItem->name_b !!} " hidden>
                    <input name="item_id" id="item_id" value="{!! $borrowedItem->item_b !!} " hidden>
                    <input name="quantity_b" id="quantity_b" value="{!! $borrowedItem->quantity_b !!} " hidden>
                       {!! Form::submit('return', ['class' => 'btn btn-primary']) !!}
                   
                    
                    {!! Form::close() !!}
                   
                    
                </div>
                 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to return it? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Return</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#')
        $('#borrowedItems-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#borrowedItems-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#borrowedItems-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop
