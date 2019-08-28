

function ajaxCallGetQuestionsForTest () {

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
 var c = document.getElementById("Class_Number").value; //remember that the db table does not hold actual class number, but the id of the class from the classes table
 var cc = document.getElementById("Class_Number").selectedIndex;
 var ccn = document.getElementById("Class_Number").options[cc].id;
 var ccText = document.getElementById("Class_Number").options[cc].innerHTML;
 alert (ccn);


 var s = document.getElementById("subjectName").value; //remember that the db table does not hold actual subject name, but the id of the class from the subjects table
 document.getElementById("classId").innerHTML = ccText;
 var ss = document.getElementById("subjectName").selectedIndex;
 var ssn = document.getElementById("subjectName").options[ss].id;
 var ssText = document.getElementById("subjectName").options[ss].innerHTML;
 alert (ssn);

 document.getElementById("subjectId").innerHTML = ssText;
 document.getElementById("for").innerHTML = "For";

 var queryString = "/Activity/createtestpreview.php?classNumber=" + ccn + "&&subjectName=" + ssn;
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
 ajaxRequest.open("POST", queryString, true);
 ajaxRequest.send(null);
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
    var inpTitle = document.getElementById("Class_Number").innerText;
    var c = document.getElementById("Class_Number").value; //remember that the db table does not hold actual class number, but the id of the class from the classes table
    var cc = document.getElementById("Class_Number").selectedIndex;
    var ccn = document.getElementById("Class_Number").options[cc].id;
    var ccText = document.getElementById("Class_Number").options[cc].innerHTML;
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
   // var ajaxReturn = JSON.parse(ajaxRequest.responseText);
   document.getElementById("ajaxResult").innerHTML = ajaxReturn;
   // document.getElementById("topicName").appendChild(ajaxReturn);

   // console.log(ajaxReturn);
 }

}
ajaxRequest.open("POST", queryString, true);
ajaxRequest.send(null);

}
