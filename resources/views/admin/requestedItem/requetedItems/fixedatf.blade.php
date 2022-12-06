<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <title>Document</title>
</head>
<body>
    <div class="container" style="text-align-last: center">
        
                <h4>Adama Science & Technology University</h4>
                <h4>Fixed Asset Transfer Form(FATF)</h4>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-sm-6">
              
                  <h5 class="card-title" style="text-align-last: center">Asset transfer too</h5>
                  <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="">Name</label>
                            <input type="text" class="form-control" value="{!! $printItem->first()->first_name,', ',$printItem->first()->last_name !!}">          
                        </div>
                        <div class="form-group">
                            <label for="" class="">Department</label>
                            <input type="text" class="form-control" readonly>
                            
                        </div>
                        <div class="from-group">
                            <label for="" class="">Building No</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Room</label>
                            <input type="text" class="form-control" value="{!! $printItem->first()->room_b !!}">
                        </div>
                        <div class="form-group">
                            
                            <label for="" class="">User No</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                                      </div>
                  </div>
                  
                  
               
    
            </div>
            <div class="col-sm-6">
                    <h5 class="card-title" style="text-align-last: center">Asset transfer from</h5>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group col-sm-12">
                                {!! Form::label('Name', 'Name: ') !!}
                                {{-- {!! Form::number('item_b', null, ['class' => 'form-control']) !!} --}}
                                <select name="name_u" id="name_u" class="form-control">
                                    @foreach ($printItem as $unitb)
                                        <option value="{!! $unitb->id !!}">{!! $unitb->first_name,',',$unitb->last_name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Department</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="from-group">
                                <label for="" class="">Building No</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Room</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                
                                <label for="" class="">User No</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                                          </div>
                      </div>
                      
                
            </div>
            <hr>
          </div>
    
    
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Discription</th>
                  <th scope="col">pin code</th>
                  <th scope="col">Serial No</th>
                  <th scope="col">Number</th>
                  <th scope="col">Date</th>
                  <th scope="col">unit</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Cost</th>
                  <th scope="col">Remark</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>{!! $printItem->first()->name_il !!}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>{!! $printItem->first()->name_iu !!}</td>
                  <td>{!! $printItem->first()->quantity_b !!}</td>
                  <td></td>
                  <td></td>
                </tr>
                
              </tbody>
            </table>
            <div class="row">
                
            <div class="form-group">
                <p>Reason for the transfer of asset________________________________________________________
                </p>
                            </div>
            </div>
            
        <div class="row">
            <div class="form-group">
                <label for="">sign of transfer</label>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">sign of recipient</label>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">sign of observer</label>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">sign of Head Of FAMU</label>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">sign of Date</label>
                <input type="text" class="form-control" readonly>
            </div>
            
        </div>

    </div>

    
<hr>
        <div class="footer">
        
        <div class="form-group">
        
            <p>This form is prepared in three copies 1st copy of FAMU, 2nd copy to the recipient and 3rd copy to transfer</p>
            <p style="text-align-last: center">Adama Science and technology Fixed Asset Transfer Form(FATF)</p>    
            
  
        </div>    
        </div>       
</body>
<script type="text/javascript">
        window.print();

            setTimeout(function () { 
                
            window.open('http://localhost:8000/admin/requestedItem/requetedItems', '_blank');
          }, 1000);
    
    
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
</html>