 
   
       
 
        
  
            <div class="table-responsive">  
                <table class="table table-bordered" >
                    <tr>
                        <td>
                          
                                <div  class="form-group col-sm-6 ">
                                    {!! Form::label('name_b', 'Borrower Name:') !!}
                                    {{-- {!! Form::number('name_b', null, ['class' => 'form-control']) !!}
                                     --}}
                                <select name="name_b" id="name_b" class="form-control">
                                    @foreach ($user as $users)
                                        <option value="{!! $users->id !!}">{!! $users->email!!}</option>
                                    @endforeach
                                </select>
                                </div>
                         
                            
                        </td> 
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>    
                    </tr>    
                </table>  
                <table class="table table-bordered" id="dynamic_field">    </table>
                    
                <div class="form-group col-sm-12 text-center">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('admin.borrowedItem.borrowedItems.index') !!}" class="btn btn-secondary">Cancel</a>
                </div>
           
    </div>   
 
  
<script type="text/javascript">  
    $(document).ready(function(){        
      //var postURL = "/addmore.php";  
      var i=1;    
  
      $('#add').click(function(){    
           i++;    
           $('#dynamic_field').append('<tr id="row'+i+'"class="dynamic-added">'+
            
                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('item_b', 'Item B:') !!}'+
                '{{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}'+
                '<select name="item_b[]" id="item_b" class="form-control">'+
                ' @foreach ($item as $itemsb)'+
                ' <option value="{!! $itemsb->id !!}">{!! $itemsb->name_il!!}</option>'+
                '@endforeach'+
                ' </select>'+
                '</div></td>'+
                 
                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('item_unit', 'Item Unit: ') !!}'+
                '<select name="item_u[]" id="item_u" class="form-control">'+
                '@foreach ($unit as $unitb)'+
                '<option value="{!! $unitb->id !!}">{!! $unitb->name_iu!!}</option>'+
                '@endforeach'+
                '</select>'+
                '</div></td>'+ 

                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('item_store', 'Item store: ') !!}'+
                '{{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}'+
                '<select name="item_s[]" id="item_s" class="form-control">'+
                '@foreach ($store as $unitb)'+
                '<option value="{!! $unitb->id !!}">{!! $unitb->type!!}</option>'+
                '@endforeach'+
                '</select>'+
                '</div></td>'+

                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('item_category', 'Item Cattegory: ') !!}'+
                '<select name="item_bc[]" id="item_bc" class="form-control">'+
                '@foreach ($catitem as $unitb)'+
                '<option value="{!! $unitb->id !!}">{!! $unitb->name_ic !!}</option>'+
                '@endforeach'+
                '</select>'+
                '</div></td>'+ 

                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('quantity_b', 'Quantity Borrowed:') !!}'+
                '<input name="quantity_b[]" id="quantity_b" class="form-control" />'+
                '</div></td>'+
    
                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('room_b', 'Room B:') !!}'+
                '<input name="room_b[]" id="room_b" class="form-control">'+
                '</div></td>'+


            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');    
      });  
  
      $(document).on('click', '.btn_remove', function(){    
           var button_id = $(this).attr("id");     
           $('#row'+button_id+'').remove();    
      });    
  
      $('#submit').click(function(){              
           $.ajax({    
                url:postURL,    
                method:"POST",    
                data:$('#add_name').serialize(),  
                type:'json',  
                success:function(data)    
                {  
                    i=1;  
                    $('.dynamic-added').remove();  
                    $('#add_name')[0].reset();  
                            alert('Record Inserted Successfully.');  
                }    
           });    
      });  
  
    });    
</script>