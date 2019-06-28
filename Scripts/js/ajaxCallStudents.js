//--------------------------------------------AJAX STARTS----------------------------------------------------------------------
         <!--
//--------------------------------------Browser Support Code-------------------------------------------------------------------
		 function ajaxChkClassFunction() {

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
            //relevant code that sends the response is in checkclasssections.php
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

                //now create two hidden fields for class number and section alpha and append to the form with id addMultiplefrm

                var addCNinput = document.createElement("input"); //create a div

								var addCNinputId = classNumber; //create its id
								//addCNinput.setAttribute("id",addCNinputId);         //set the id of the div
                addCNinput.setAttribute("name",addCNinputId);         //set the id of the div
                addCNinput.value = classNumber;
								addCNinput.innerHTML = classNumber;    //set the display text

								addMultiplefrm.appendChild(addCNinput);

                var addSAinput = document.createElement("input"); //create a div

								var addSAinputId = sectionAlpha; //create its id
								//addSAinput.setAttribute("id",addSAinputId);         //set the id of the div
                addSAinput.setAttribute("name",addSAinputId);         //set the id of the div
                addSAinput.value = sectionAlpha;    //set the display text
								addSAinput.innerHTML = sectionAlpha;    //set the display text

								addMultiplefrm.appendChild(addSAinput);


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

                //addMultipleis defined in the calling file ie newClasssections.php
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
            var queryString = "/AddNew/checkclasssections.php?classNumber=" + classNumber + "&&sectionAlpha=" + sectionAlpha ;

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

    }
