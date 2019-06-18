//--------------------------------------------AJAX STARTS----------------------------------------------------------------------
         <!--
//--------------------------------------Browser Support Code-------------------------------------------------------------------
		 function ajaxGetRemoveClass(a,b) {
          var atext = a.innerHTML;
          var btext = b.innerHTML;
            var ajaxRequest;  // The variable that makes Ajax possible!

            try {
               // Opera 8.0+, Firefox, Safari
               ajaxRequest = new XMLHttpRequest();
            } catch (e) {

               // Internet Explorer Browsers
               try {
                  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
               } catch (e) {

                  try {
                     ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                  } catch (e) {
                     // Something went wrong
                     alert("Your browser broke!");
                     return false;
                  }
               }
            }

            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.

            ajaxRequest.onreadystatechange = function() {
	//------------collect values of the class name and section alpha of the row ---------------------


    				   if(ajaxRequest.readyState == 4) {

      					  var ajaxReturn = ajaxRequest.responseText;	//ajaxRequest.responseText contains the result of the query send by this function (LOOK FOR IT at the bottom of this function where "queryString" is present.
                  //relevant code that sends the response is in checkclasssections.php
                  //should hold 1 key value pair if exists

                  var ajaxDeleteResponse = document.getElementById("status");

                  	//div that will display the response to user

      					  //AJAX call has to query the removeClass php, perform the action and return a success or failure message

      					  if (ajaxReturn) {//Step 1: Record already present in db
      						        console.log(ajaxReturn);

                          ajaxDeleteResponse.innerHTML = ajaxReturn;
      					   }
      					   //
      					   else {
                     console.log("failed");;
      					   }
                }

          }

            // Now get the value from user and pass it to
            // server script.
            var queryString = "/RemoveRecords/RemoveClass.php?cn=" + atext + "&&sa=" + btext ;

            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);

         }
         //-->
		 //--------------------------------------------AJAX FOR EXISTING RECORDS ENDS----------------------------------------------------------------------
