<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body" style="background-color: #e7e1e8;">
                        <div class="row">
                            <div class="col-md-6 row">
                                <div class="col-md-3">
                                    <p><b>
                                            ሞዴል 19<br>
                                            Model 19</b>
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <center><img src="http://ppms.astu.edu.et/img/m19/log.png" width="35%"></center>
                                </div>
                                <div class="col-md-3">
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <p><b>የኢትዮጲያ ፌደራላዊ ዴሞክራሲያዊ ሪፐብሊክ <br>
                                                THE FEDERAL DEMOCRATIC REPUBLIC OF ETHIOPIA
                                                <br> የገንዘብና የኢኮኖሚ ልማት ሚንስቴር
                                                <br> MINISTRY OF FINANCE AND ECONOMY DEVELOPMENT</b></p>
                                    </center>
                                    <br>
                                    <b> የ - Department </b> <input type="text" class="form-control" id="for" name="for"
                                        value="" disabled="">
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-md-2">
                                </div>

                                <div class="col-md-6">
                                    <p>
                                        <b>ሴሪ<br>Serial</b>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <b>No: <select id="serial_no" class="form-control" name="serial_no">
                                                <option value="12589">12589</option>
                                            </select>
                                        </b>
                                    </p>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <p>
                                        <b>
                                            1. ዋጋው በገንዘቡ ወጪ መዝገብ የተፃፈበት ተራ ቁጥር____________<br>
                                              Item No. In Expenditure Registry<br>
                                            2. በዕቃ ገቢ መዝገቡ የገባበት ንሞራ____________<br>
                                              No of entry in register of incoming goods<br>
                                            3. ለዕቃ የተሰጠው መደብ________________<br>
                                              Clasification of Stock<br>
                                            4. በዕቃ ገቢ መዝገቡ የገባበት ንሞራ____________<br>
                                              No of entry in register of incoming goods<br>
                                            5. ለዕቃ የተሰጠው መደብ________________<br>
                                              Clasification of Stock<br>
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <center><b>የ ዕ ቃ ው    ወ ይ ም    ን ብ ረ ት    ገ ቢ    ደ ረ ሰ ኝ</b></center>
                            <center><b>RECEIPT FOR ARTICLES OR PROPERTY RECEIVED</b></center>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <p><b>ስም<br>Name</b></p>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="name"><option value="1424">ሳሙኤል ሀይሉ ደምሴ</option></select>
                                </div>
                                <div class="col-md-3 pull-right">
                                    <p><b>ከዚህ በታች በዝርዝር የተመለከተውን<br>Received the Following</b></p>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="received" name="received" disabled="">
                                </div>
                        
                                <div class="col-md-1">
                                    <p><b><br>The</b></p>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="the" name="the" disabled="">
                                </div>
                                <div class="col-md-1 pull-right">
                                    <p><b>ቀን<br>Date</b></p>
                                </div>
                                <div class="col-md-2">
                                    <select id="recived-date" class="form-control" name="recived-date"><option value="2022-12-02">2020-12-25</option></select>
                                </div>
                                <div class="col-md-1 pull-right">
                                    <p><b>ዓ.ም     ከ<br>E.C</b></p>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="from"><option value="1">METEC</option></select>
                                </div>
                                <div class="col-md-1 pull-right">
                                    <p><b>ተቀብያለሁ::</b></p>
                                </div>
                        
                            </div>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                                <table style="background-color:#ffffff; " class="table table-striped table-bordered" id="itemInspections-table" width="100%">
                                    <thead>
                                    <tr>
                                        <th rowspan="2"><center><p>ተራ ቁጥር<br>Serial No</p></center></th>
                                        <th rowspan="2"><center><p>የዕቃው ወይም ንብረት አይነት ዝርዝር<br>Detailed Description of Articles or Property</p></center></th>
                                        <th rowspan="2"><center><p>ሞዴል<br>Model</p></center></th>
                                        <th rowspan="2"><center><p>ሴሪ<br>Serie</p></center></th>
                                        <th colspan="2"><center><p>ተከታታይ<br>Page No</p></center></th>
                                        <th rowspan="2"><center><p>ብዛት<br>Quantity</p></center></th>
                                        <th colspan="2"><center><p>ያንዱ ዋጋ<br>Unit Price</p></center></th>
                                        <th colspan="2"><center><p>የዋጋ ድምር<br>Total Price</p></center></th>
                                    </tr>
                                    <tr>
                                        <th><center><p>ከ<br>From</p></center></th>
                                        <th><center><p>እስከ<br>To</p></center></th>
                                        <th><center><p>ብር<br>Birr</p></center></th>
                                        <th><center><p>ሳ<br>C</p></center></th>
                                        <th><center><p>ብር<br>Birr</p></center></th>
                                        <th><center><p>ሳ<br>C</p></center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                                <tr>
                                        <td>1</td>
                                        <td>Lexark Printer</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>52 - Meter</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                                <tr><td colspan="7"><p class="float-right"><b>ድምር<br>Total</b></p></td>
                                    <td colspan="4"><b>123 - thousand</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6"><center><b><p>አስረካቢው<br>Deliverer(Donor)</p></b></center></div>
                                <div class="col-md-6"><center><b><p>ተረካቢው<br>Deliverer(Recipient)</p></b></center></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4"><center><select class="form-control" name="donor"><option value="1">METEC</option></select></center></div>
                                <div class="col-md-2"></div>
                        
                                <div class="col-md-4"><center><select id="recipient" class="form-control" name="recipient"><option value="1424">ሳሙኤል ሀይሉ ደምሴ</option></select></center></div>
                                <div class="col-md-1"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <center><p><b><u>ማመልከቻ፡</u></b>  ይህ ካርኒ (softcopy) የተጠቀሰው ዕቃ ወደ ስቶር መግባቱን ለማረጋገጥ ከወረቀቱ (hardcopy) በተጨማሪ የምንጠቀምበት ይሆናል፡፡ </p></center>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" data-id="3" id="add-items" class="btn btn-primary pull-right">Confirm / Sign</button>
                                </center>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>