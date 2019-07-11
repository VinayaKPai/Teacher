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
				var classNumberDG = document.getElementById("classNumberDG").value;
				var subjectNameDG = document.getElementById("subjectNameDG").value;
        var topicNameDG = document.getElementById("topicNameDG").value;
        var typeNameDG = document.getElementById("typeNameDG").value;

				   if(ajaxRequest.readyState == 4) {
             var ajaxReturn = JSON.parse(ajaxRequest.responseText);
             var status = document.getElementById("status");
             status.inerHTML = ajaxReturn;
               }

            }

			if (classNumberDG && subjectNameDG && topicNameDG && typeNameDG) {
        console.log(classNumberDG + subjectNameDG + topicNameDG + typeNameDG);
            var queryString = "/AddNew/Existing/questions.php?classNumberDG=" + classNumberDG + "&&subjectNameDG=" + subjectNameDG + "&&topicNameDG=" + topicNameDG + "&&typeNameDG=" + typeNameDG;
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send();
			}

			 else {
				 alert ("FIll in FN, LN and sfdb df bdgb");
			 }
         }
         //-->
