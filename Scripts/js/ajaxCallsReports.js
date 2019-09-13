function addReportToPreview(e) {

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
   var p = e.id;
   var tname = document.getElementById("teacherName").value;
   alert (p + tname);
   var queryString = "/AddNew/Existing/reports.php?reportName=" + p + "&&teacherId=" + tname;
   console.log(queryString);

   ajaxRequest.onreadystatechange = function() {
     if(ajaxRequest.readyState == 4) {
       var ajaxReturn = ajaxRequest.responseText;
      document.getElementById("ajaxRes").innerHTML = ajaxReturn;

    }
   }
   ajaxRequest.open("GET", queryString, true);
   ajaxRequest.send(null);
  }
