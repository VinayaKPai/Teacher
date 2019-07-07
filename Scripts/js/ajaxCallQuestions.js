//--------------------------------------------AJAX STARTS----------------------------------------------------------------------
         <!--
//--------------------------------------Browser Support Code-------------------------------------------------------------------
		 function ajaxChkQuestionsFunction() {

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
	//------------collect values (from 4 drop down select elements to be sent to ajax---------------------
				var classNumber = document.getElementById("classNumber").value;
				var subjectName = document.getElementById("subjectName").value;
        var topicName = document.getElementById("topicName").value;
        var typeName = document.getElementById("typeName").value;

				   if(ajaxRequest.readyState == 4) {
var ajaxReturn = ajaxRequest.responseText;
					  //var ajaxReturn = JSON.parse(ajaxRequest.responseText);	//ajaxRequest.responseText contains the result of the query send by this function
					  var statusponse = document.getElementById('status');	//div that will display the response to user

               }

            }

			if (classNumber && subjectName && topicName && typeName) {
            var queryString = "/AddNew/existingquestions.php?classNumber=" + classNumber + "&&subjectName=" + subjectName + "&&topicName" + topicName + "&&typeName" + typeName;

            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);
			}

			 else {
				 alert ("FIll in FN, LN and sfdb df bdgb");
			 }
         }
         //-->
