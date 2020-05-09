
    function ajaxCallStudents(stud) {
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

      					  var ajaxReturn = ajaxRequest.responseText;
      					  var ajaxResponse = document.getElementById('ajaxRes');
                  ajaxResponse.innerHTML = ajaxReturn;
      					   }
            }

            var queryString = "/Scripts/php/singleStudentDetails.php?studentId=" + stud ;
console.log(queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);


         }
         //-->

     function ajaxCallExploreStudent(i) {
       // var item = document.getElementById(i.id);
        // alert (i);
        var arr = i.split(" ");
        alert (arr);
        var tc = arr[0];
        var cl = arr[1];
        var se = arr[2];
        var su = arr[3];
        if (arr[4]) {
          su = su + arr[4];
        }
        // alert (i.data-section);
        // alert (i.data-subject);

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

            var ajaxReturn = ajaxRequest.responseText;
            var ajaxResponse = document.getElementById('exploreajaxRes');
            ajaxResponse.innerHTML = ajaxReturn;
             }

            }

            var queryString = "/Scripts/php/exploreStudent.php?studentId=" + tc;
  console.log(queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);


         }
         //-->
