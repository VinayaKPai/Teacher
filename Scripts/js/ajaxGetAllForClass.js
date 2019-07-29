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
	//------------collect values (from 1 drop down select elements to be sent to ajax---------------------
				    // clear all the options from subjecName and topicName
            var subjectName = document.getElementById("subjectName"); //to prepare the subjectName element to reveive the response
            var topicName = document.getElementById("topicName"); //to prepare the subjectName element to reveive the response
            //we need to remove any pre-existing options from the dropdown
            subjectName.innerHTML = "<option></option>";     //this will fire the ajaxGetTopForSub - LOOKOUT!
            topicName.innerHTML = "<option></option>";      //no ajax call on this drop down
            //we need an empty option so as to avoid default values in the select elements - no id, or innerText
                // var crEmpOpt = document.createElement("option");
                // crEmpOpt.id = "";
                // crEmpOpt.innerText = "";
                // subjectName.appendChild(crEmpOpt);
                // topicName.appendChild(crEmpOpt);

          if(ajaxRequest.readyState == 4) {
             // console.log(typeof(ajaxRequest.responseText));   //returns STRING
					  var ajaxReturn = JSON.parse(ajaxRequest.responseText);
            //console.log(typeof(ajaxReturn));                  //returns OBJECT after being parsed

            var aRetLength = ajaxReturn.length;

            for (i=0;i<aRetLength;i++) {  //loop through the objects in the parsed response text and create option element for each
              var crOpt = document.createElement("option");
              crOpt.id = ajaxReturn[i];
              crOpt.setAttribute("name",ajaxReturn[i]);
              crOpt.innerText = ajaxReturn[i];
              subjectName.appendChild(crOpt);
            }
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

 }
//-->
    function ajaxGetTopForSub() {

    var ajaxRequest;  // The variable that makes Ajax possible!
//state can change if classnumner changes or subjectname changes

      ajaxRequest.onreadystatechange = function() {
          //------------collect values (from 2 drop down select elements to be sent to ajax---------------------
          var classNumber = document.getElementById("classNumber").value;
          var subjectName = document.getElementById("subjectName").value;
          var topicName = document.getElementById("topicName");

          var topicNamec = topicName.children.length;
          // console.log(topicNamec + "  This is the empty option only");
              //we need to remove any pre-existing options from the dropdown
           topicName.innerHTML = "";
           //we need an empty option so as to avoid default values in the select elements - no id, or innerText

            var crEmpOpt = document.createElement("option");
            crEmpOpt.id = "";
            crEmpOpt.innerText = "";
            topicName.appendChild(crEmpOpt);

          if(ajaxRequest.readyState == 4) {

              var ajaxReturn = JSON.parse(ajaxRequest.responseText);
              //console.log(typeof(ajaxReturn));                  //returns OBJECT after being parsed

              var aRetLength = ajaxReturn.length;


              for (i=0;i<aRetLength;i++) { //loop through the objects in the parsed response text and create option element for each
                    var crOpt = document.createElement("option");
                		crOpt.id = ajaxReturn[i];
                		crOpt.setAttribute("name",ajaxReturn[i]);
                		crOpt.innerText = ajaxReturn[i];
                   	topicName.appendChild(crOpt);
                }

          }

     }

             // Now get the value from user and pass it to
             // server script.
       var subjectName = document.getElementById('subjectName').value;
       var classNumber = document.getElementById('classNumber').value;

       if (subjectName) {
             var queryString = "/AddNew/getTopForSub.php?subjectName=" + subjectName + "&&classNumber=" + classNumber;
             // console.log (queryString);
         ajaxRequest.open("GET", queryString, true);
         ajaxRequest.setRequestHeader("content-type", "application/json");
             ajaxRequest.send(null);
       }

}



// SELECT * FROM balls where type LIKE '%vol%'  ORDER BY id desc
