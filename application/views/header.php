<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" 
  href="<?php echo base_url('assets/img/logo2.png');?>" />

  <link href="<?php echo base_url('assets/css/normalize.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/bootstrap.sandstone.css'); ?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/font-awesome.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/jaktrip.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/ion.rangeSlider.skinFlat.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/ion.rangeSlider.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/sm-core-css.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/sm-clean.css');?>" type="text/css" rel="stylesheet"/>
  <link href="<?php echo base_url('assets/css/sm-clean2.css');?>" type="text/css" rel="stylesheet"/>
  <script src="<?php echo base_url('assets/js/gmaps.js')?>"></script>
  
  <title> JAKtrip: Explore fun places within your budget in Jakarta</title>

  <style>
    header{
      background-image: url('<?php echo base_url("assets/img/header.png");?>');
      height: 530px;
    }

    @font-face { 
      font-family: Tuffy; 
      src: url('<?php echo base_url("assets/fonts/Tuffy.otf");?>');
    }

    @font-face { 
      font-family: TuffyBold; 
      src: url('<?php echo base_url("assets/fonts/Tuffy_Bold.otf");?>');
    }

    @font-face { 
      font-family: Lato; 
      src: url('<?php echo base_url("assets/fonts/lato-regular.ttf");?>');
    }

    @font-face { 
      font-family: LatoBlack; 
      src: url('<?php echo base_url("assets/fonts/lato-black.ttf");?>');
    }
  </style>
  <script>

        function addTrip1(place_name1, halte_name1, busway_price1, angkot_price1, ticket_price1, total_price1, transport_info1, place_info1)
        {
       //   alert("nama tempat : " + place_name1 +"<br>nama halte : "+halte_name1+"<br>busway : "+busway_price1+"<br>angkot : "+angkot_price1 + "<br>tiket : " + ticket_price1+"<br>total :"+total_price1);
           
            var place_name =  getCookie("placeName");
            var halte_name = getCookie("halteName");
            var busway_price = getCookie("buswayPrice");
            var angkot_price = getCookie("angkotPrice");
            var ticket_price = getCookie("ticketPrice");
            var total_price = getCookie("totalPrice");
            var transport_info = getCookie("transportInfo");
            var place_info = getCookie("placeInfo");
            tempdata = place_name1 + "-" +halte_name1+ "-"+busway_price1+ "-"+angkot_price1+ "-"+ticket_price1+ "-"+total_price1+ "-"+transport_info1+ "-"+ place_info1;
      //      alert(getCookie("placeName"));
          
           
             jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  tempdata},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/addingTrip/",
              success: function(res) {
                  if (res)
                  {

                    var output = getCookie("placeName").replace(/\+/gi, " ");
          //          alert(res);
                   var obj = jQuery.parseJSON(res);

             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                    
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      
                        var ticketPrice = 0; 
                        var isWeekend = getCookie("isWeekend");
                        // alert(isWeekend);
                        if(isWeekend == "true")
                        {

                          ticketPrice = obj.query.result[i].weekend_price;
                          
                        }
                        else
                        {
                          ticketPrice = obj.query.result[i].weekday_price;
                        }

                        // output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                        // output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        // output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        // output = output + "<td height='20px' class='tuffyh3a'>"+obj.query.result[i].place_name+"<br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                        if(obj.query.sudahDipilih[i] == true)
                        {
                          output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                          output = output + "<button class='btn btn-warning disabled' onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br>";
                          // <a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                        else
                        {
                           output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                          output = output + "<button class='btn btn-warning' onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br>";
                          // <a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                            
                        
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                    $("#goingFrom").html(place_name1);
                   showTheItinerary1();
                  }
                  }
                });
        }

        function addTrip11(place_name1, halte_name1, busway_price1, angkot_price1, ticket_price1, total_price1, transport_info1, place_info1)
        {
       
   //         alert("aja");
            var place_name =  getCookie("placeName");
            var halte_name = getCookie("halteName");
            var busway_price = getCookie("buswayPrice");
            var angkot_price = getCookie("angkotPrice");
            var ticket_price = getCookie("ticketPrice");
            var total_price = getCookie("totalPrice");
            var transport_info = getCookie("transportInfo");
            var place_info = getCookie("placeInfo");
            var budget = getCookie("budget");
            var idx_last_trip = getCookie("idxLastTrip");
            
            var sisaBudget = parseInt(budget)-parseInt(total_price1);
            tempdata = place_name1 + "-" +halte_name1+ "-"+busway_price1+ "-"+angkot_price1+ "-"+ticket_price1+ "-"+total_price1+ "-"+transport_info1+ "-"+ place_info1+"-"+sisaBudget;
      
          
     //      alert(budget);
             jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  tempdata},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/addingTrip11/",
              success: function(res) {
                  if (res)
                  {

                    var output = getCookie("placeName").replace(/\+/gi, " ");
                    // alert(res);

                   var obj = jQuery.parseJSON(res);

             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                      var sudahHabis = true;
                     for(var i = 0; i<obj.query.result.length; i++)
                        {
                            var ticketPrice = 0; 
                            var isWeekend = getCookie("isWeekend");
                            // alert(isWeekend);
                            if(isWeekend == "true")
                            {

                              ticketPrice = obj.query.result[i].weekend_price;
                              
                            }
                            else
                            {
                              ticketPrice = obj.query.result[i].weekday_price;
                            }
                            if(obj.query.sudahDipilih[i] != true && sisaBudget >= obj.query.harga[i])
                            {
                    //          alert(obj.query.harga[i] + " " + sisaBudget);
                              sudahHabis = false;
                              // output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                            output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                            output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                            output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip11('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br></td>";
                            output = output + "</tr>";
                            
                            }
                            else
                            {
                              
                            }
                            
                        }
                    if(sudahHabis)
                    {
                      output = output + "<p>You don't have enough money to add new trip</p>";
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                   $("#goingFrom").html(place_name1);
                   $("#input_price").val(sisaBudget);
                   showTheItinerary1();
                  }
                  }
                });
        }

        function showTheItinerary1()
        {
         // alert("ayayaya");
          var itineraryPlace = getCookie("placeName").replace(/\+/gi, " ");
          var itineraryPlaceArray = itineraryPlace.split("xx");
          var itineraryTotalPrice = getCookie("totalPrice").replace(/\+/gi, " ");
          var itineraryTotalPriceArray = itineraryTotalPrice.split("xx");
          var LastCounterTrip = parseInt(getCookie("counterTrip"));
           var yangDipilih = "";
          yangDipilih = yangDipilih + "<table class='table' style='color: #1c1c1c !important;'><tr><th style='font-size: 16px;'>Daftar Tempat Wisata</th></tr></table>";
            yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
          tripCost = 0;
          var isRekomendasi = getCookie("isRekomendasi").replace(/\+/gi, " ");
          for(var i=0; i<itineraryPlaceArray.length; i++)
          {
            if(itineraryPlaceArray[i]!='terhapus' && itineraryPlaceArray[i]!="")
              {
                yangDipilih  = yangDipilih + "<tr><td><img src='http://localhost/Jaktrip/assets/img/50.jpg' class='img-rounded' width='50' height='50' style='margin-top: 3px;'></td><td style='color: #1c1c1c !important;'>"+itineraryPlaceArray[i]+"<br>Rp "+itineraryTotalPriceArray[i]+"<br> <!--a class='toZoom' onclick='return setMapLocationZoom(\""+itineraryPlaceArray[i]+"\")'>see location in map<a--></td><td><a class ='removeTrip'";
                if(isRekomendasi=="true")
                {
                  yangDipilih = yangDipilih + "onclick='return deleteTrip11 (\""+itineraryPlaceArray[i]+"\")' ><span class='fa fa-trash-o'></span></a></td></tr>";
                 
                }
                else
                {
                  yangDipilih = yangDipilih + "onclick='return deleteTrip1(\""+itineraryPlaceArray[i]+"\")' ><span class='fa fa-trash-o'></span></a></td></tr>";
                }
                
                  tripCost = tripCost + parseInt(itineraryTotalPriceArray[i]);
              }

              
          }
     //       alert(getCookie("idxFirstTrip") + " " + getCookie("idxLastTrip"));
            yangDipilih = yangDipilih + "</table></div>";
            yangDipilih = yangDipilih + "<table class='table' style='color: #1c1c1c !important;'><tr><th style='font-size:16px;'>Your Trip Cost</th><th style='font-size:16px;'>Rp "+tripCost+"</th><th><a href='http://localhost/Jaktrip/index.php/viewTripCtr'><button class='btn btn-warning pull-right' style='margin-top: -10px;'>View Trip</button></a></th></tr></table>"
            $("#theTrip").html("Trip ("+LastCounterTrip+")  <span class='fa fa-bus'></span>")
   //       alert(getCookie("placeName").replace(/\+/gi, " "));
     //     alert(tripCost);
            $(".buttonAtasToggle").popover({
              html : true,
            content: function(){
              return yangDipilih; 
            }
            });
            $('.buttonAtasToggle').attr('data-content', yangDipilih);
            var popover = $('.buttonAtasToggle').data('popover');
            $('[data-toggle="popover"]').popover('hide');
          
        }
        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname+"="+cvalue+"; "+expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function deleteTrip1(place_name1)
        {

          var countTrip = parseInt(getCookie("counterTrip"));
          if(countTrip==1)
          {

            jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  place_name1},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/deleteTrip/"+ place_name1,
              success: function(res) {
                  if (res)
                  {
                    
                    var output = getCookie("placeName").replace(/\+/gi, " ");
               //     alert(res);
               var halte_awal = getCookie("halteAwal");
                   var obj = jQuery.parseJSON(res);
             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table table-hover'>";
                     var isWeekend = getCookie("isWeekend");
                     var ticketprice = 0;
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      if(isWeekend == "true")
                      {
                        ticketprice = obj.query.result[i].weekend_price;    
                      }
                      else
                      {
                        ticketprice = obj.query.result[i].weekday_price;
                      }
                      output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                    output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                    
                    output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaBusway[i]+" (harga busway) + "+obj.query.result[i].transport_price+" (harga angkot) + "+ticketprice+" (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketprice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br></td>";
                  //    output = output + "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga : "+obj.query.hargaBusway[i]+" (harga Busway) + "+obj.query.result[i].transport_price+" (harga Angkot) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                        // output = output + "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga : "+obj.query.hargaBusway[i]+" (harga Busway) + "+obj.query.result[i].transport_price+" (harga Angkot) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";
                        
                    }
                 
                    output = output+ "</table>";
                 //   alert(output);

                   $("#blogMain").html(output);
                    $("#goingFrom").html("Halte " + halte_awal);
                   showTheItinerary1();
                  }
                  }
                });
          }
          else
          {
              jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  place_name1},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/deleteTrip/"+ place_name1,
              success: function(res) {
                  if (res)
                  {
                    var output = getCookie("placeName").replace(/\+/gi, " ");
             //       alert(res);
                   var obj = jQuery.parseJSON(res);
             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table table-hover'>";
                    
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      //  output = output + "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga : "+obj.query.hargaBusway[i]+" (harga Busway) + "+obj.query.result[i].transport_price+" (harga Angkot) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";
                      
                     //    output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                     var ticketPrice = 0; 
                        var isWeekend = getCookie("isWeekend");
                        // alert(isWeekend);
                        if(isWeekend == "true")
                        {

                          ticketPrice = obj.query.result[i].weekend_price;
                          
                        }
                        else
                        {
                          ticketPrice = obj.query.result[i].weekday_price;
                        }

                        // output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                        // output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        // output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        // output = output + "<td height='20px' class='tuffyh3a'>"+obj.query.result[i].place_name+"<br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                        if(obj.query.sudahDipilih[i] == true)
                        {
                           output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                          output = output + "<button class='btn btn-warning disabled' onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br>";
                          // <a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                        else
                        {
                           output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><br>";
                          output = output + "<button class='btn btn-warning' onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br>";
                          // <a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                   
                   showTheItinerary1();
                  }
                  }
                });
          }
          
        }

         function deleteTrip11(place_name1)
        {

          var countTrip = parseInt(getCookie("counterTrip"));
          if(countTrip==1)
          {

            jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  place_name1},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/deleteTrip/"+ place_name1,
              success: function(res) {
                  if (res)
                  {
        //            alert(res);
                    var output = getCookie("placeName").replace(/\+/gi, " ");
               //     alert(res);
                   var obj = jQuery.parseJSON(res);
             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table table-hover'>";
                     var isWeekend = getCookie("isWeekend");
                     var halte_awal = getCookie("halteAwal");
                     var ticketprice = 0;
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      if(isWeekend == "true")
                      {
                        ticketprice = obj.query.result[i].weekend_price;    
                      }
                      else
                      {
                        ticketprice = obj.query.result[i].weekday_price;
                      }
                      output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                    output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                    
                    output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaBusway[i]+" (harga busway) + "+obj.query.result[i].transport_price+" (harga angkot) + "+ticketprice+" (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip11('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketprice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br></td>";
                  
                        
                    }
                 
                    output = output+ "</table>";
                 //   alert(output);

                   $("#blogMain").html(output);
                    $("#goingFrom").html("Halte " + halte_awal);
                   $("#input_price").val(getCookie("budget"));
                   showTheItinerary1();
                  }
                  }
                });
          }
          else
          {
              jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  place_name1},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/deleteTrip/"+ place_name1,
              success: function(res) {
                  if (res)
                  {
         //           alert(res);
                    var place_name = getCookie("placeName").replace(/\+/gi, " ");;
                    var halte_name = getCookie("halteName");
                    var busway_price = getCookie("buswayPrice");
                    var angkot_price = getCookie("angkotPrice");
                    var ticket_price = getCookie("ticketPrice");
                    var total_price = getCookie("totalPrice");
                    var transport_info = getCookie("transportInfo");
                    var place_info = getCookie("placeInfo");
                    var budget = getCookie("budget");
                    var idx_last_trip = getCookie("idxLastTrip");
                    var total_price_array = total_price.split("xx");
                    var halte_name_array = halte_name.split("xx");
              //      alert(total_price_array.length);
                    var semuaHarga = 0;
                    var place_name_array = place_name.split("xx");
                    for(var i=0; i<total_price_array.length-1; i++)
                    {
       //                 alert(place_name_array[i]);
                        if(place_name_array[i]!="terhapus")
                        {
                          semuaHarga = semuaHarga + parseInt(total_price_array[i]);
                        }
                        
                    }
                    var firstBudget = parseInt(getCookie("firstBudget"));
                    var sisaBudget = firstBudget-semuaHarga;
                    var output = getCookie("placeName").replace(/\+/gi, " ");
           //         alert(semuaHarga);
                   var obj = jQuery.parseJSON(res);
             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table table-hover'>";
                    
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      var ticketPrice = 0; 
                            var isWeekend = getCookie("isWeekend");
                            // alert(isWeekend);
                            if(isWeekend == "true")
                            {

                              ticketPrice = obj.query.result[i].weekend_price;
                              
                            }
                            else
                            {
                              ticketPrice = obj.query.result[i].weekday_price;
                            }
                            if(obj.query.sudahDipilih[i] != true && sisaBudget >= obj.query.harga[i])
                            {
                    //          alert(obj.query.harga[i] + " " + sisaBudget);
                              sudahHabis = false;
                              // output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";

                            output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                            output = output + "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                            output = output + "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - Indoor Play - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+ticketPrice+" (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip11('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">ADD TO TRIP</button><br></td>";
                            output = output + "</tr>";
                            
                            }
                            else
                            {
                              
                            }
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                    $("#goingFrom").html(halte_name_array[idx_last_trip]);
                    $("#input_price").val(getCookie("budget"));
                   showTheItinerary1();
                  }
                  }
                });
          }
          
        }
        // function showRating(place_name)
        // {
          
        //   $("#mapcanvas").hide();
        //   $("#detailrating").show();
        //   jQuery.ajax({
        //         type: "POST",
        //         url: "http://localhost/JAKtrip/index.php/DetailCtr/getdetail/" + place_name,
        //         success: function(res) {
        //             if (res)
        //             {

        //         var obj = jQuery.parseJSON(res);
        //         var resultQuery = "";
        //         var resultQuerydetail = "";
        //         for (var i=0 ; i<obj.query.length; i++){
        //           //resultQuery = resultQuery +obj.query[i].place_name+"<br>";
        //           resultQueryname = resultQuery +obj.query[i].place_name;
        //           resultQuerydetail = resultQuerydetail +obj.query[i].description;
        //         }
                
        //       $("#namatempat").html(resultQueryname);
        //       $("#info").html(resultQuerydetail);
        //       }             
        //     }
        //         }
        //     );


        //   getReview(place_name);
        // }

       
    
</script>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="<?php echo base_url('index.php/homeCtr');?>" style="background-image: url(<?php echo base_url('assets/img/logo.png');?>) !important;"></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>&nbsp;&nbsp;&nbsp;</li>
          <li><a href="<?php echo base_url('index.php/allPlacesCtr');?>">PLACES</a></li>
          <li><a href="#">PROMO</a></li>
          </ul>

        <ul class="nav navbar-nav navbar-right sm sm-clean2" id="main-menu">
         <?php
            if(isset($_COOKIE["username"]))
            {
              
          //    echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";
               
            }
            else
            {
              echo "<li><a href='#'>Sign Up</a></li>";
              echo "<li><a href='#openLogin'>Log In</a></li>";
            }
            
          ?>
          <!--li><a href="#">Sign Up</a></li-->
          
          <!--<?php
        //if(isset($_COOKIE["username"]))
        {

        //  echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";  
        }
        //else
        {
        //  echo "<li><a href='#openLogin'>Log In</a></li>";
        }
      ?>-->
            <!--li><a href="#openLogin">Log In</a></li-->
            <div id="openLogin" class="openModal">
              <div>
                <a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a>
                <center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>

                <form role="form" class="form-group" method="POST" action="http://localhost/Jaktrip/index.php/loginCtr/checkLogin/">
                  <input class="form-control form-group" type="text" placeholder="E-mail/username" name="username" required>
                  <input class="form-control form-group" type="password" placeholder="Password" name="password" required>
                  <span class="col-lg-6"><input type="checkbox" name="remember"> Remember me</span>
                  <span class="col-lg-6" style="text-align: right;"><a href="#">Forgot password?</a></span><br><br>
                  <button class="login btn btn-warning" type="submit">LOG IN</button><br><br>
                  <center>Or login with your account below<center>
                  <div class="iconsocial col-lg-12">
                    <div class="col-lg-3"></div>
                    <a class="col-lg-2" href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>
                    <a class="col-lg-2" href="#"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a>
                    <a class="col-lg-2" href="#"><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>
                    <div class="col-lg-3"></div>
                  </div>
                  <br>
                  <center><span>Don't have an account? <a href="#">Sign Up.</a></span><center>
                </form>
          </div>
            </div>
          <li id="popoverEdit1"><a type="button" id="theTrip" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"   
              data-toggle="popover">Trip (0)  <span class="fa fa-bus"></span></a>

           <?php
            if(isset($_COOKIE["username"]))
            {
              
          //    echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";
              echo "<li><a href=\"#\">".$_COOKIE['username']."<img src=\"base_url('/assets/img/25.png')\" class=\"ava-rounded\" style=\"position: relative;\"/></a><ul><li><a  href=\"#\">Edit Profile</a></li><li><a  href=\"http://localhost/Jaktrip/index.php/ManageTourAttrCtr\">Admin Page</a><a  >My Trips</a></li><li><a  href=\"#\">Collection</a></li><li><a  href=\"#\">Reviews</a></li><li><a  href=\"http://localhost/Jaktrip/index.php/searchCtr/logout\">Logout</a></li></ul>";  
            }
            
          ?>
          <!-- if udah login <li><a href="#">Michelle <img src="../assets/img/25.png" class="ava-rounded" style="position: relative;"/></a>
            <ul>
              <li><a  href="#">Edit Profile</a></li>
              <li><a  href="#">My Trips</a></li>
              <li><a  href="#">Collection</a></li>
              <li><a  href="#">Reviews</a></li>
              <li><a  href="#">Logout</a></li>
            </ul>-->
          </li> 
        </ul>
      </div>
    </div>
  </nav>