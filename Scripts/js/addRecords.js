//script does: Moves records that are returned by ajaxCalls into an array to be posted to the addClass.php for insertion into db
// 	1.	creates an empty array to hold objects 
//		a.	objects will be key-value pairs for classNumber and sectionAlpha
//	2.	makes sure that the divs containing the ajax response received from ajaxCalls are emptied when they are moved to the Q list
//	3.	


	var a = "";
	var addMultiple = [];	//an array to hold records that have to be inserted into db in one click
	var addMultiple1 = [];	//an array to hold records that have to be inserted into db in one click	

//---------------readyToAdd QUEUE MULTIPLE RECORDS FOR ADDING IN ONE SHOT ------------------------------------------------------------------
//-----------------only creates an array does not insert the records as that will be done by php file addClass.php
			function readyToAdd(a,b) {
				//set response and button divs to blanks
				document.getElementById("ajaxRes").innerHTML = "";
				document.getElementById("addBtn").innerHTML = "";
				
				//create a p element to hold the class name and section alpha
				
				//this is only to display to the user the items being prepared to add to the db
				//ability to "Remove from List"(text button) and "ADD ALL" with button 
				var addDiv = document.createElement("div");
				var addDivId = a + b;
				
				
				addDiv.setAttribute("id",addDivId);
				addDiv.innerHTML = a + "-" + b;
				
					//create a remove text element to go with the q'd record
					//create an id to help removal
					var remId = "rem" + addDivId;
					var rem = document.createElement("span");
					rem.id = remId ;
					rem.style.margin = "20px";
					rem.class = "btn btn-text";
					rem.innerHTML = "Remove";
						
			
				
				//append the two element
				document.getElementById("readyToAdd").appendChild(addDiv);
				//append removal span to div element
				document.getElementById(addDivId).appendChild(rem);
				
				//set the drop downs to a blank selection
				var cn = document.getElementById("classNumber"); 	//the dropdown select for class number
				cn.selectedIndex = 0;
				var sa = document.getElementById("sectionAlpha");	//the dropdown select for section alpha
				sa.selectedIndex = 0;
				
				//add the selections to an array for further processing
				var newRowData = "[className=>" + a + ",sectionAlpha=>" + b + "]";	//create an object of 2 key value pairs
				addMultiple.push(newRowData);										//push the object into the array that holds records q'd for insertion to db
				
				var arrayPopulation = (addMultiple.length); 
				
				//to reflect singular and plural where appropriate
				if (arrayPopulation > 1) {
					var recText = "records";	//when more than one record in Q - plural
					var butText = "ADD ALL";	//when more than one record in Q _ ADD ALL
					
					//to reduce user confusion and prevent unexpected behaviour, hide submit button
					var hideSubmit = document.getElementById("submit");
					hideSubmit.style.display = "none";
					
				}
				else {
					recText = "record";	//Single reord - singular
					butText = "ADD";	//Single record - just ADD
				}
				document.getElementById("recsInQ").innerHTML = addMultiple.length + " " + recText + " in queue";
				
				//if there is at least one item in the array, a button should be available to send the items for processing
				if (arrayPopulation > 0) {
					//a button is already present in the DOM with display none
					//set display to block
								
					var addAll = document.getElementById("addAll");
					addAll.innerHTML = butText;
					addAll.style.display = "block";
					
					
				}
			} 
//---------------------QUEUE MULTIPLE RECORDS readyToAdd function ENDS---------------------------------------------------------
