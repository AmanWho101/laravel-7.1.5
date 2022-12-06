
            <div class="table-responsive">  
                <table class="table table-bordered" >
                    <tr>
                        <td>
                                <div  class="form-group col-sm-6 ">
                                    
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
                    '{!! Form::label('store_id', 'Store:') !!}'+
                    ' @if (isset($store))'+
                    '<select name="store_id[]" id="store_id[]" class="form-control">'+
                    '@foreach ($store as $stores)'+
                    '<option value="{{$stores->id}}">{{$stores->type}}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '@endif'+
                    '@if (isset($store_id))'+
                    '{!! Form::number('store_id[]', null, ['class' => 'form-control']) !!}'+
                    '@endif'+
                    '{{-- {!! Form::number('store_id[]', null, ['class' => 'form-control']) !!} --}}'+   
                    '</div></td>'+

                    '<td><div class="form-group col-sm-12">'+
                    '{!! Form::label('item_list_id[]', 'Item List:') !!}'+
                    
                    '@if (isset($item_list_id))'+
                    '{!! Form::number('item_list_id[]', null, ['class' => 'form-control']) !!}'+
                    '@endif'+
                    '@if (isset($iteml))'+
                    '<select name="item_list_id[]" id="item_list_id[]" class="form-control">'+
                        '@foreach ($iteml as $iteml)'+
                            '<option value="{{$iteml->id}}">{{$iteml->name_il}}</option>'+
                        '@endforeach'+
                    '</select>    '+
                    '@endif'+
                    '</div></td>'+

                    '<td><div class="form-group col-sm-12">'+
                    '{!! Form::label('item_category_id', 'Item Category:') !!}'+
                    '@if (isset($item_category_id))'+
                    '{!! Form::number('item_category_id[]', null, ['class' => 'form-control']) !!}'+
                    '@endif'+
                    '@if (isset($itemc))'+
                    '<select name="item_category_id[]" id="item_category_id[]" class="form-control">'+
                        '@foreach ($itemc as $itemc)'+
                            '<option value="{{$itemc->id}}">{{$itemc->name_ic}}</option>'+
                        '@endforeach'+
                    '</select>'+   
                    '@endif'+
                    '</div></td>'+

                    '<td><div class="form-group col-sm-12">'+
                    '{!! Form::label('quantity', 'Quantity:') !!}'+
                    '{!! Form::number('quantity[]', null, ['class' => 'form-control']) !!}'+
                    '</div></td>'+

                    '<td><div class="form-group col-sm-12">'+
                    '{!! Form::label('name_iu', 'Item Unit:') !!}'+
                    '@if (isset($item))'+
                    '<select name="item_unit_id[]" id="item_unit_id[]" class="form-control">'+
                        '<option value="{!! collect($item)->first() !!}">{!! collect($item)->first()->type !!}</option>'+
                    '</select>'+  
                    '@endif'+
                    '@if (isset($itemu))'+
                    '<select name="item_unit_id[]" id="item_unit_id[]" class="form-control">'+
                        '@foreach ($itemu as $itemu)'+
                            '<option value="{{$itemu->id}}">{{$itemu->name_iu}}</option>'+
                        '@endforeach'+
                    '</select>'+    
                   ' @endif'+
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