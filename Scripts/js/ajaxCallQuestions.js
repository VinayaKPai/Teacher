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
      		   if(ajaxRequest.readyState == 4) {
               var ajret = document.getElementById("ajret");
               ajret.inerHTML = ajaxRequest.responseText;
               // var ajaxReturn = JSON.parse(ajaxRequest.responseText);
               // var et = document.getElementById("existTable");
               // et.inerHTML = ajaxReturn;
                 }

              }
              //------------collect values (from 4 drop down select elements to be sent to ajax---------------------
                var classNumber = document.getElementById("classNumber").value;
                var subjectName = document.getElementById("subjectName").value;
                var topicName = document.getElementById("topicName").value;
                var typeName = document.getElementById("typeName").value;
                var searchString = "";

                if (classNumber != "") {
                  searchString += "classNumber=" + classNumber;
                }
                if (subjectName != "") {
                  if (searchString == "") {
                    searchString += "subjectName=" + subjectName;
                  }
                  else {
                    searchString += "&&subjectName=" + subjectName;
                  }
                }
                if (topicName != "") {
                  if (searchString == "") {
                    searchString += "topicName=" + topicName;
                  }
                  else {
                    searchString += "&&topicName=" + topicName;
                  }
                }
                if (typeName != "") {
                  if (searchString == "") {
                    searchString += "typeName=" + typeName;
                  }
                  else {
                    searchString += "&&typeName=" + typeName;
                  }
                }
      console.log(searchString);


          if (searchString) {
                var queryString = "/AddNew/Existing/questions.php?";
                console.log (queryString);
                 queryString += searchString;
                ajaxRequest.open("POST", queryString, true);
                ajaxRequest.send();
                console.log (queryString);
        	}

}
         -->

function ajaxCallGetQuestions () {
 alert("Ajax started");

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
 var c = document.getElementById("Class_Number").value;

 var s = document.getElementById("subjectName").value;

 var queryString = "/AddNew/Existing/questions.php?classNumber=" + c + "&&subjectName=" + s;
 console.log(queryString);

 ajaxRequest.onreadystatechange = function() {
   if(ajaxRequest.readyState == 4) {
     var ajaxReturn = ajaxRequest.responseText;
    // var ajaxReturn = JSON.parse(ajaxRequest.responseText);
    document.getElementById("existingQuestions").innerHTML = ajaxReturn;
    // document.getElementById("topicName").appendChild(ajaxReturn);

    // console.log(ajaxReturn);
  }

 }
 ajaxRequest.open("GET", queryString, true);
 ajaxRequest.send(null);
}
