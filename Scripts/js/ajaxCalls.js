//--------------------------------------------AJAX STARTS----------------------------------------------------------------------
         <!--
//--------------------------------------Browser Support Code-------------------------------------------------------------------
		 function ajaxChkClassFunction() { //NO LONGE BEING USED FOR POPULATING ANY DROPDOWN

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
    				var sectionAlpha = document.getElementById("sectionAlpha").value;


				   if(ajaxRequest.readyState == 4) {

					  var ajaxReturn = JSON.parse(ajaxRequest.responseText);	//ajaxRequest.responseText contains the result of the query send by this function (LOOK FOR IT at the bottom of this function where "queryString" is present.
            //relevant code that sends the response is in checkclasses_taught_by_teachers.php
            //should hold 1 key value pair if exists
//alert (ajaxReturn); //a test to check the response that is coming from the response text - the drop downs still hold the selections that were captured as className and sectionAlpha
					  var ajaxResponse = document.getElementById('ajaxRes');	//div that will display the response to user
					  var remBtn = document.getElementById('remBtn');			//div where an Remove from Q button will be displayed
					  var remBtnId =  ajaxReturn[1];

					  //Step 1 - checked db via the ajax call - returns '0' if doesn't exist and '1' if exists
					   	//So shouldn't have an ADD button
					  //Step 2 - check queued records to see if already queued for insertion
					   	//So shouldn't be added to Q again
					  //If neither in db, nor in Q, the record can be added to the Q
					   	//Should have a 'Remove' option in the Q'd list

					  if (ajaxReturn[0] === 1) {//Step 1: Record already present in db
						alert (classNumber + "-" + sectionAlpha + " already exists in the db. ");
					   }

					  else {//Step 2: check Q'd items
						  var chkAddId = (classNumber + sectionAlpha);
						   var chkAddRecordQ = document.getElementById(chkAddId); //if elements exists this will return it

						   if (chkAddRecordQ) {//ie. element exists in Q
							   alert (classNumber + sectionAlpha + " is queued for addition. Select another record to add. ");
						   }
						   else {//Record not in DB, not in Q so add to Q
								//create the Add to Q button and append to DOM

                var addDiv = document.createElement("div"); //create a div
								var addDivId = classNumber + sectionAlpha ; //create its id
								addDiv.setAttribute("id",addDivId);         //set the id of the div
								addDiv.innerHTML = classNumber + "-" + sectionAlpha;    //set the display text
                //append the element to ajax response div
								//document.getElementById("ajaxRes").appendChild(addDiv);
								ajaxResponse.appendChild(addDiv);

								//create a remove text element to go with the q'd record

								var remId = "rem" + addDivId; //create an id to help removal
								var rem = document.createElement("div");  //create the div to hold the text
								rem.id = remId ;                            //set the id of the span
							   	//rem.href = "";
							  rem.style.cursor =  "pointer";
								rem.innerHTML = "Remove from Q";
							  rem.setAttribute("onclick","removeItem(this.id)");


								//append removal span to div element
								document.getElementById("remBtn").appendChild(rem);

								//set the drop downs to a blank selection
								var cn = document.getElementById("classNumber"); 	//the dropdown select for class number
								cn.selectedIndex = 0; //sets the dropdown selection to default
								var sa = document.getElementById("sectionAlpha");	//the dropdown select for section alpha
								sa.selectedIndex = 0; //sets the dropdown selection to default

								//add the selections to an array for further processing
								var newRowData = {classNumber , sectionAlpha };	//create an object of 2 key value pairs

                //addMultipleis defined in the calling file ie newclasses_taught_by_teachers.php
								addMultiple.push(newRowData);										//push the object into the array that holds records q'd for insertion to db

								var arrayPopulation = (addMultiple.length);

								//to reflect singular and plural where appropriate
								if (arrayPopulation > 1) {
									var recText = "records";	//when more than one record in Q - plural
									var butText = "ADD ALL";	//when more than one record in Q _ ADD ALL

							//to reduce user confusion and prevent unexpected behaviour, hide submit button
							//below code exists in original code - not required here
							//but if this is finalised, then this need to be unquoted

							var hideSubmit = document.getElementById("submit");
							hideSubmit.style.display = "none";
              document.getElementById("addAll").style.display = "block";

							}
							else {
								recText = "record";	//Single reord - singular
								butText = "ADD";	//Single record - just ADD
							}
						document.getElementById("recsInQ").innerHTML = addMultiple.length + " " + recText + " in queue";

					   }

					   }

						//if there is at least one item in the array, a button should be available to send the items for processing
						if (arrayPopulation > 0) {
							//a button is already present in the DOM with display none
							//set display to block

							var addAll = document.getElementById("addAll");
							addAll.innerHTML = butText;
							addAll.style.display = "block";


						}
               }

            }

            // Now get the value from user and pass it to
            // server script.
      var classNumber = document.getElementById('classNumber').value;
			var sectionAlpha = document.getElementById('sectionAlpha').value;
			if (classNumber && sectionAlpha) {
            var queryString = "/AddNew/checkclasses_taught_by_teachers.php?classNumber=" + classNumber + "&&sectionAlpha=" + sectionAlpha ;

            ajaxRequest.open("GET", queryString, true);
            ajaxRequest.send(null);
			}

			 else {
				 alert ("Select both");
			 }
         }
         //-->
		 //--------------------------------------------AJAX FOR EXISTING RECORDS ENDS----------------------------------------------------------------------
     function ajaxAddAll(arrs) {
       console.log(arrs);
       var lnl = "../../Scripts/php/addNewClasses.php";
       var csi = arrs[0].classNumber + arrs[0].sectionAlpha;
       var csii = arrs[1].classNumber + arrs[1].sectionAlpha;
       var csiii = arrs[2].classNumber + arrs[2].sectionAlpha;
       var ssd = ("{'data1':'"+csi+"'},{'data2':'"+csii+"'},{'data3':'"+csiii+"'}");

    $.ajax({
            type : "POST",  //type of method
            url  : lnl,  //your page
            data : ssd,// passing the values
            success: function(res){
                  console.log ("RESPONSE FROM PHP INTO AJAX\n" + res);                  //do what you want here...
                    }
        });
    }

    function ajaxCallGetTopics () {
      // alert("Ajax started");
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
      var queryString = "/AddNew/getTopics.php?";
      var c = document.getElementById("filteredClasses");
      var s = document.getElementById("filteredSubjects");

      var z = c.children.length;
      var y = s.children.length;

      var addClassNumbersToJsQuery;
      var addSubjectNamesToJsQuery;

      var selectedClassNumbers = []; //an array to be sent with index classNumber in the URL
      var selectedSubjectNames = []; //an array to be sent with index subjectName in the URL

      if (z>0) { //already queryString = queryString + "classNumber=";
           for (i=0;i<z;i++) {
             selectedClassNumbers[i] = c.children[i].id;
            }
            addClassNumbersToJsQuery = "classNumber=" + selectedClassNumbers;
        }
      if (y>0) {
           for (j=0;j<y;j++) {
             selectedSubjectNames[j] = s.children[j].id;
            }
          addSubjectNamesToJsQuery = "subjectName=" + selectedSubjectNames;
        }


// console.log(addClassNumbersToJsQuery);
// console.log(addSubjectNamesToJsQuery);

if (z>0 && y==0) {//ONLY classNumber
  queryString = queryString + addClassNumbersToJsQuery;
}

if (z==0 && y>0) {//ONLY subjectName
  queryString = queryString + addSubjectNamesToJsQuery;
}

if (z>0 && y>0) {//BOTH classNumber and subjectName
  queryString = queryString + addClassNumbersToJsQuery + "&&" + addSubjectNamesToJsQuery;
}

// console.log(queryString);
      ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4) {
          var ajaxReturn = ajaxRequest.responseText;
         // var ajaxReturn = JSON.parse(ajaxRequest.responseText);
         // document.getElementById("topicName").innerHTML = ajaxReturn;
         // document.getElementById("topicName").appendChild(ajaxReturn);

         // console.log(ajaxReturn);
       }

      }
console.log(queryString);
      ajaxRequest.open("GET", queryString, true);
      ajaxRequest.send(null);
    }
