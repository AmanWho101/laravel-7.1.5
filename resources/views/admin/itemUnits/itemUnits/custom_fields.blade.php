
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
                    <a href="{!! route('admin.itemUnits.itemUnits.index') !!}" class="btn btn-secondary">Cancel</a>
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
                '{!! Form::label('name_iu', 'Name Of the Unit:') !!}'+
                '{!! Form::text('name_iu[]', null, ['class' => 'form-control']) !!}'+
                '</div></td>'+
    
                '<td><div class="form-group col-sm-12">'+
                '{!! Form::label('Discription', 'Discription :') !!}'+
                '{!! Form::text('discription[]', null, ['class' => 'form-control']) !!}'+
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