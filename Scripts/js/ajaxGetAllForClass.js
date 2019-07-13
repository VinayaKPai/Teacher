//--------------------------------------------AJAX STARTS----------------------------------------------------------------------
         <!--
//--------------------------------------Browser Support Code-------------------------------------------------------------------
		 function ajaxGetSubForClass() {

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
	//------------collect values (from 2 drop down select elements to be sent to ajax---------------------
				    var classNumberDG = document.getElementById("classNumberDG").value;

				   if(ajaxRequest.readyState == 4) {
             console.log(typeof(ajaxRequest.responseText));   //STRING
					  var ajaxReturn = JSON.parse(ajaxRequest.responseText);
            console.log(typeof(ajaxReturn));                  //OBJECT
            console.log("Ajax Return = " + ajaxReturn);
            var sa = document.getElementById("subjectNameDG");
            var aRetLength = ajaxReturn.length;
            console.log(aRetLength);
            for (i=0;i<aRetLength;i++) {
              var crOpt = document.createElement("option");
              crOpt.id = ajaxReturn[i];
              crOpt.innerText = ajaxReturn[i];
              crOpt.onchange = "ajaxGetTypforTop()";
              sa.appendChild(crOpt);
            }

               }

            }

            // Now get the value from user and pass it to
            // server script.
      var classNumberDG = document.getElementById('classNumberDG').value;

			if (classNumberDG) {
            var queryString = "/AddNew/getSubForClass.php?classNumberDG=" + classNumberDG ;
            console.log (queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.setRequestHeader("content-type", "application/json");
            ajaxRequest.send(null);
			}
ajaxGetTopForSub();
         }
         //-->
         //-->
function ajaxGetTopForSub() {

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
    //------------collect values (from 2 drop down select elements to be sent to ajax---------------------
              var subjectNameDG = document.getElementById("subjectNameDG").value;

             if(ajaxRequest.readyState == 4) {

              var ajaxReturn = ajaxRequest.responseText;

              console.log("Ajax Return = " + ajaxReturn);
              var ta = document.getElementById("topicNameDG");
              var ops = ta.children.length;
              console.log(ops);//WORKS!!!!

              // loop through all children
              for (i=0;i<ops;i++) {
                var opt = ta[i].innerText;
                console.log(opt);

                    }
                 }

              }

              // Now get the value from user and pass it to
              // server script.
        var subjectNameDG = document.getElementById('subjectNameDG').value;

        if (subjectNameDG) {
              var queryString = "/AddNew/getTopForSub.php?subjectNameDG=" + subjectNameDG + "&&classNumberDG=" + classNumberDG;
              console.log (queryString);
              ajaxRequest.open("GET", queryString, true);
              ajaxRequest.setRequestHeader("content-type", "application/json");
              ajaxRequest.send(null);
        }

           }
