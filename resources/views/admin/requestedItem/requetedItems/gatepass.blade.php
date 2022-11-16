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
    <div class="container">
        <div style="text-align-last: center">
            <h4>Adama Science And Technology University</h4>
            <h5>Gate Pass For And Other Properties(GP) </h5>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">fixed PIN no </th>
                    <th scope="col">consumable supplies</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>{!! $printItem->first()->name_il !!}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  
                </tbody>
              </table>
        </div>
        <div class="container">
            <h4>Reason for Issuance Of Assets</h4>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">For Repaire</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox2">Personal Property</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                <label class="form-check-label" for="inlineCheckbox3">Borrowed</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                <label class="form-check-label" for="inlineCheckbox3">ASTU/Business</label>
              </div>
              <h4>Reason for Issuance Of Assets</h4>____________________________________

        </div>
        <div class="container">
            <h4>Issue of the Asset</h4>
            <div class="form-group form-check-inline">
                <label class="col-sm-4 col-form-label" for="">Requested by</label>
                <div class="col-sm-10"><p class="form-control-plaintext" >______________{!! $printItem->first()->first_name,',',$printItem->first()->last_name !!}__________</p></div>
            </div>
            <div class="form-group form-check-inline">
                <label class="col-sm-4 col-form-labe l" for="">Approved Supervisor</label> 
                 <div class="col-sm-10"><p class="form-control-plaintext" >_____________________________</p></div>
            </div>
            <div class="form-group form-check-inline">
                <label class="col-sm-4 col-form-labe l" for="">Authorized by Head of Fam officer</label> 
                <div class="col-sm-10"><p class="form-control-plaintext" >_________________{!! Sentinel::getUser()->first_name,',',Sentinel::getUser()->last_name !!}_______________</p></div>
            </div>
            <div class="form-group">
                <p>1 copy gate pass</p>
                <p>1 copy to FAM</p>
                <p>1 copy PAD</p>
            </div>
        </div>
        
    </div>
</body>
<script type="text/javascript">
    window.print();

        setTimeout(function () { 
        window.open('http://localhost:8000/admin/requestedItem/requetedItems', '_blank');
        window.close();
      }, 1000);


</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</html>
