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
				    var classNumber = document.getElementById("classNumber").value;
            var sa = document.getElementById("subjectName");

            var sac = sa.children.length;
            // console.log(sac + " C. This is the empty option only");
              if (sac > 1) {
                sa.innerHTML = "";
                var crEmpOpt = document.createElement("option");
                crEmpOpt.id = "";
                crEmpOpt.innerText = "";
                sa.appendChild(crEmpOpt);
              }


				   if(ajaxRequest.readyState == 4) {
             // console.log(typeof(ajaxRequest.responseText));   //STRING
					  var ajaxReturn = JSON.parse(ajaxRequest.responseText);
            //console.log(typeof(ajaxReturn));                  //OBJECT
            //console.log("Ajax Return = " + ajaxReturn);
            var aRetLength = ajaxReturn.length;
            // console.log(aRetLength + " = A Ret Length");



            for (i=0;i<aRetLength;i++) {
              var crOpt = document.createElement("option");
              crOpt.id = ajaxReturn[i];
              crOpt.setAttribute("name",ajaxReturn[i]);
              crOpt.innerText = ajaxReturn[i];
              sa.appendChild(crOpt);
            }
            var sacd = document.getElementById("subjectName").children.length;
            // console.log(sacd + " d should be empty ele plus pre ex eles plus newly added");

               }

            }

            // Now get the value from user and pass it to
            // server script.
      var classNumber = document.getElementById('classNumber').value;

			if (classNumber) {
            var queryString = "/AddNew/getSubForClass.php?classNumber=" + classNumber ;
            console.log (queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.setRequestHeader("content-type", "application/json");
            ajaxRequest.send(null);
			}
 // ajaxGetTopForSub();
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

          ajaxRequest.onreadystatechange = function() {
              //------------collect values (from 2 drop down select elements to be sent to ajax---------------------
            var classNumber = document.getElementById("classNumber").value;
            var subjectName = document.getElementById("subjectName").value;
          	var ta = document.getElementById("topicName");

          	var tac = ta.children.length;
          	// console.log(tac + "  This is the empty option only");
          	if (tac > 1) {
          	ta.innerHTML = "";
          	var crEmpOpt = document.createElement("option");
          	crEmpOpt.id = "";
            crOpt.setAttribute("name",ajaxReturn[i]);
          	crEmpOpt.innerText = "";
          	ta.appendChild(crEmpOpt);
          }


          if(ajaxRequest.readyState == 4) {

                        var ajaxReturn = JSON.parse(ajaxRequest.responseText);

                        // console.log("Ajax Return = " + ajaxReturn);
          	var aRetLength = ajaxReturn.length;
                      // console.log(aRetLength + " = A Ret Length");
                      if (aRetLength == 0) {
                        alert ("U-O!");
                      }


          	for (i=0;i<aRetLength;i++) {
                         var crOpt = document.createElement("option");
                          crOpt.id = ajaxReturn[i];
                          crOpt.innerText = ajaxReturn[i];
                          ta.appendChild(crOpt);
                              }
          	var tacd = document.getElementById("topicName").children.length;
                      // console.log(tacd + " d should be empty ele plus pre ex eles plus newly added");

                           }

                        }

                        // Now get the value from user and pass it to
                        // server script.
                  var subjectName = document.getElementById('subjectName').value;
                  var classNumber = document.getElementById('classNumber').value;
          // console.log(subjectName);

                  if (subjectName) {
                        var queryString = "/AddNew/getTopForSub.php?subjectName=" + subjectName + "&&classNumber=" + classNumber;
                        // console.log (queryString);
                        ajaxRequest.open("GET", queryString, true);
                        ajaxRequest.setRequestHeader("content-type", "application/json");
                        ajaxRequest.send(null);
                  }

    }
