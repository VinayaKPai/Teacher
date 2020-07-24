

function ajaxCallGetQuestionsForTest () { //FROM ACTIVITY > TESTMODULE PHP

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

 // Create a function that will receive data sent from the server and will update div section in the same page.
 var c = document.getElementById("classNumber").value; //remember that the db table does not hold actual class number, but the id of the class from the classes table
 var cc = document.getElementById("classNumber").selectedIndex;
 var ccn = document.getElementById("classNumber").options[cc].id;
 var ccText = document.getElementById("classNumber").options[cc].innerHTML;
 // alert (ccn);


 var s = document.getElementById("subjectName").value; //remember that the db table does not hold actual subject name, but the id of the class from the subjects table
 document.getElementById("classId").innerHTML = ccText;
 var ss = document.getElementById("subjectName").selectedIndex;
 var ssn = document.getElementById("subjectName").options[ss].id;
 var ssText = document.getElementById("subjectName").options[ss].innerHTML;
 // alert (ssn);

 document.getElementById("subjectId").innerHTML = ssText;
 document.getElementById("for").innerHTML = "For";

 var queryString = "/Activity/createtestpreview.php?classNumber=" + ccn + "&&subjectName=" + ssn;
 console.log(queryString);

 ajaxRequest.onreadystatechange = function() {
   if(ajaxRequest.readyState == 4) {
     var ajaxReturn = ajaxRequest.responseText;

    document.getElementById("existingQuestions").innerHTML = ajaxReturn;

  }
 }
 ajaxRequest.open("POST", queryString, true);
 ajaxRequest.send(null);
 queryString = "";
 c.selectedIndex = 0;
 s.selectedIndex = 0;
}


function ajaxSaveTest() {
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

  var sendTest = [];
  var aa= document.getElementsByTagName("input");
    for (var i =0; i < aa.length; i++){
      if (aa[i].checked) {
        sendTest.push(aa[i].id);
      }
    }
    var inpTitle = document.getElementById("newTestId").value;
    var c = document.getElementById("classNumber").value; //remember that the db table does not hold actual class number, but the id of the class from the classes table
    var cc = document.getElementById("classNumber").selectedIndex;
    var ccn = document.getElementById("classNumber").options[cc].id;
    var ccText = document.getElementById("classNumber").options[cc].innerHTML;
    // alert (ccn);


    var s = document.getElementById("subjectName").value; //remember that the db table does not hold actual subject name, but the id of the class from the subjects table
    document.getElementById("classId").innerHTML = ccText;
    var ss = document.getElementById("subjectName").selectedIndex;
    var ssn = document.getElementById("subjectName").options[ss].id;
    var ssText = document.getElementById("subjectName").options[ss].innerHTML;
    // alert (ssn);
var queryString = "/AddNew/addnewtest.php?saveTest=" + sendTest + "&&classId=" + ccn + "&&subjectId=" + ssn + "&&inpTitle=" + inpTitle;
console.log(queryString);

ajaxRequest.onreadystatechange = function() {
  if(ajaxRequest.readyState == 4) {
    var ajaxReturn = ajaxRequest.responseText;

   document.getElementById("ajaxResult").innerHTML = ajaxReturn;

 }

}
ajaxRequest.open("POST", queryString, true);
ajaxRequest.send(null);

}



function ajaxDeployActivity(e,f,g,h,i) {
  //e=classId,
  //f=section id
  //g=assessment id,
  //h=date
  //i=deployment type T(for test)/A(forAssignment)/Q(for quiz),
  alert (e + f + g + h + i);
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

    var queryString = "/Activity/deploytest.php?depActivity=" + g + "&&dateToDeploy=" + h + "&&depType=" + i + "&&sectionId=" + f + "&&classId=" + e;
    console.log(queryString);

    ajaxRequest.onreadystatechange = function() {
      if(ajaxRequest.readyState == 4) {
        var ajaxReturn = ajaxRequest.responseText;

     }
    }
    ajaxRequest.open("GET", queryString, true);
    ajaxRequest.send(null);
  }

function alterDeploy(e) {
  alert (e.id);
}
function filterTests() {
  alert ("Filter Clicked");
}

function ajaxCallCreateActivity (arr,act) {
  //arr is array of selected questions in SetUpPages/newQuestions.php
  //act is id of clicked button - either test or assignment or quiz
    // alert (arr + act);
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

    var queryString = "/Activity/createactivity.php?qarray=" + arr;
    console.log(queryString);

    ajaxRequest.onreadystatechange = function() {
      if(ajaxRequest.readyState == 4) {
        var ajaxReturn = ajaxRequest.responseText;
       document.getElementById("ajaxResult").innerHTML = ajaxReturn;

     }

    }
    ajaxRequest.open("POST", queryString, true);
    ajaxRequest.send(null);

}

function ajaxCallSaveNewActivity (arr,act) {//function will send a request to the createactivity.php file to save the created activity
  //arr is the array of q nos,
  //act is the title
alert(arr+"====="+act);
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
  console.log(act);

  var act = document.getElementById("inpTitle").value;
  if (act!="") {
      var queryString = "/Activity/createactivity.php?qarray=" + arr + "&inpTitle=" + act;

console.log(queryString);

      ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4) {
          var ajaxReturn = ajaxRequest.responseText;
         document.getElementById("ajaxResult").innerHTML = ajaxReturn;

       }

      }
      ajaxRequest.open("POST", queryString, true);
      ajaxRequest.send(null);
    }
    else {
      alert ("We need a title for the activity");

    }

}
