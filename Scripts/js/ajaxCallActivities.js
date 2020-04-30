

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



function deploy(e,f,g,h) {//e=button, f=T(for test)/A(forAssignment)/Q(for quiz), g=subjectId, h=classId
  alert (e.id + f + g + h);
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

    var dt = document.getElementsByName(e.id)[0].value;
    var msg;
    // alert (e.id + dt);
    if (!dt) {
      dt = "Date less";
      msg = (" cannot be deployed " + dt);
    }
    else { msg = " to be deployed on "+dt;}
    // alert ("Test Papar " + e.id + msg);

    var queryString = "/Activity/deploytest.php?depTest=" + e.id + "&&dateToDeploy=" + dt + "&&depType=" + f + "&&subjectId=" + g + "&&classId=" + h;
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

    var filename = "create" + act + ".php";
    console.log(filename);

    var queryString = "/Activity/"+ filename +"?qarray=" + arr;
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

function ajaxCallSaveNewActivity (e,c,s,act) {//function will send a request to the createxxx.php file to save the created activity
  //e is the array of q nos,
  //c is the classId,
  //s is the subjectName and
  //act is the activity assignment/test/quiz

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
  // var filename = "create" + act + ".php";
  // console.log(filename);
  var tit = document.getElementById("inpTitle").value;
  if (tit!="") {
      // var queryString = "/Activity/"+ filename +"?qarray=" + e + "&classId=" + c + "&subjectName=" + s + "&inpTitle=" + tit;
      // The above original query was sending the test/assignment/quiz to different filteredSubjects
      // Below query is an attempt to send to a single file and there decide on what is the flag for the activity - A or T or Q
      var queryString = "/Activity/createactivity.php?qarray=" + e + "&classId=" + c + "&subjectName=" + s + "&inpTitle=" + tit + "&&activityType=" + act;

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
