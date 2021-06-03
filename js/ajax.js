
$(document).ready(function(){
        $( "#comm" ).click(function(event)
        {
          var comm = $(this).children("option:selected").val();
         
            $.ajax(
                {
                    type:"post",
                    url: "GetConduite.php",
                    data:{ comm:comm},
                    success:function(response)
                    {
                     $('#conduite').removeAttr("disabled");
                      var obj = $.parseJSON(response);
                      $('#conduite').find('option')
                      .remove()
                      .end()
                      $.each(obj, function (index, object) {

                      $('#conduite').append(new Option(object['nom'], object['id']));
      
                    
                     });
                
                     
                      
                  }
                });
                 
              });

              $( "#conduite" ).click(function(event)
              {
                var conduite = $(this).children("option:selected").val();
               
                  $.ajax(
                      {
                          type:"post",
                          url: "GetCercle.php",
                          data:{ conduite:conduite},
                          success:function(response)
                          {
                            $('#cercle').removeAttr("disabled");
                            var obj = $.parseJSON(response);
                            $('#cercle').find('option')
                            .remove()
                            .end()
                            $.each(obj, function (index, object) {
      
                            $('#cercle').append(new Option(object['nom'], object['id']));
            
                          
                           });
                      
                           
                            
                        }
                      });
                       
                    });

                    $( "#_lister" ).click(function(event)
              {
                var db = $("#db").val();
                var df = $("#df").val();
               
                  $.ajax(
                      {
                          type:"post",
                          url: "GetInfraction.php",
                          data:{ db:db,df:df},
                          success:function(response)
                          {
                           
                            var obj = $.parseJSON(response);
                            $('#tab').find('tr')
                            .remove()
                            .end()
                            var taille = 0;
                            $.each(obj, function (index, object) {
      
                            $('#tab').append(`<tr><td>${object['nom_commune']}</td><td>${object['nom_conduite']}</td><td>${object['nom_zone']}</td><td>${object['nom']}</td><td>${object['date']}</td><td>${object['type']}</td><td>${object['pv']}</td><td>
                            <button id ="delete" type="button" rel="tooltip" onclick ="Delete(${object['id']})" class="btn btn-danger btn-icon btn-sm btn-simple" data-original-title="" title="">
                            <i class="ni ni-fat-remove pt-1">X</i>
                        </button> 
                        
                        <a  rel="tooltip" href="Update.php?id=${object['id']}" class="btn btn-success btn-icon btn-sm btn-simple" data-original-title="" title="">
                        <i class="ni ni-fat-update pt-1">U</i>
                    </a></td></tr>`);
                              taille = index;
                          
                           });
                           taille++;
                           $("#stat").append(`<div class="alert alert-danger text-center"  role="info">

                           <h5><b>Nombre des infraction est : ${taille} </b></h5>
                           </div>`);
                           
                            
                        }
                      });
                       
                    });

                    

                    
        });
        