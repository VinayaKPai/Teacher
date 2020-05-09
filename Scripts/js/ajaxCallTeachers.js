
	    function ajaxCallTeachers(t) {
       // alert (t+p);
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

            var queryString = "/Scripts/php/singleTeacherClasses.php?teacherId=" + t;
console.log(queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);


         }
         //-->

     function ajaxCallExploreItem(i) {
       // i will have 4 space separated values.
       // if the function is called from newTeacher.php:
       // first value is the teacher id
       // second value is the class id
       // third value is the section Id
       // and fourth value is the subject NAME (not id)
        var arr = i.split(" ");
        // alert (arr);
        var tc = arr[0];  //the teacher id
        var cl = arr[1];  //the class id
        var se = arr[2];  //the section id
        //su and the following if statement don't seem to be in use anywhere
        var su = arr[3];  //the subject NAME
        if (arr[4]) {
          su = su + arr[4];
        }

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
//sending the tacher id, the class id, and the section id to explore teacher php which will return the students from the teacher-class-section combo
            var queryString = "/Scripts/php/exploreTeacher.php?teacherId=" + tc + "&&classId=" + cl + "&&sectionId=" + se ;
  console.log(queryString);
            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);


         }
         //-->
