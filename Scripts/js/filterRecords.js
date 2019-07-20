function filterQuestions() {
  var classNumber = document.getElementById("classNumber").value;
  var subjectName = document.getElementById("subjectName").value;
  var topicName = document.getElementById("topicName").value;
  var typeName = document.getElementById("typeName").value;


  var targetTable = document.getElementById("existTable");  //find the table
      // targetTable.style.width = "100%";
      // targetTable.style.padding = "5px";
      // targetTable.style.border.spacing = "2px";
      // targetTable.style.border.collapse = "separate";
      // targetTable.style.align = 'center';
  var targetTrs = targetTable.getElementsByTagName("tr");   //find all the rows IN THE TABLE
  // var trCount = targetTrs.length;                           //count the rows


    var exists = [];  //an array to hold only those incoming variables that are not empty
    var i;    //in tr td loop
    var p;    //in inputArray loop
    var criteria = []; //to build search string
    var cellNameVar;
    var td;

<<<<<<< HEAD
    var inputArray = [classNumber, subjectName, topicName, typeName]; //an array with all the incoming data
    //check if any of the inputs are null and push into exists if not null
    for (p=0;p<inputArray.length;p++) {
      if (p===0) {cellNameVar = "targetClass";}
      if (p===1) {cellNameVar = "targetSubject";}
      if (p===2) {cellNameVar = "targetTopic";}
      if (p===3) {cellNameVar = "targetType";}
      if (inputArray[p] !== "") {  //if the item has value, we want to use it for searching
        exists.push([inputArray[p],cellNameVar]);
        criteria += (cellNameVar + "===" + inputArray[p]);
        // console.log(criteria + " = criteria inside if not");
      }
    }
    // console.log(criteria + " = criteria");
    //
    // console.log(exists + " = exists");

=======
    // var inputArray = [classNumber, subjectName, topicName, typeName]; //an array with all the incoming data
    // //check if any of the inputs are null and push into exists if not null
    // for (p=0;p<inputArray.length;p++) {
    //   if (p===0) {cellNameVar = "targetClass";}
    //   if (p===1) {cellNameVar = "targetSubject";}
    //   if (p===2) {cellNameVar = "targetTopic";}
    //   if (p===3) {cellNameVar = "targetType";}
    //   if (!inputArray[p] == "") {  //if the item has value, we want to use it for searching
    //     exists.push([inputArray[p],cellNameVar]);
    //     criteria += (cellNameVar + "===" + inputArray[p]);
    //     console.log(criteria + " = criteria inside if not");
    //   }
    // }
    // console.log(criteria + " = criteria");
    //
    // console.log(exists + " = exists");
    //
    //
    // var len = exists.length;
    // var searchString = "";
    //
    // for (z=0;z<len-1;z++) {
    //   searchString += (exists[z][1] + " == \"" + exists[z][0] + "\" && ");
    // }
    // searchString += exists[len-1][1] + " == \"" + exists[len-1][0] + "\"";
    // console.log(searchString + " = searchString");
    // //exists now holds all the search criteria
    // //eg [classNumberDG,0] and [typeNameDG,3]
>>>>>>> caab492c4e87e433829178e5710a99197e367fdd

    var inputObject = {classNumber: classNumber, subjectName: subjectName, topicName: topicName, typeName: typeName};

<<<<<<< HEAD
    for (z=0;z<len-1;z++) {
      searchString += (exists[z][1] + " === \"" + exists[z][0] + "\" && ");
    }
    searchString += exists[len-1][1] + " === \"" + exists[len-1][0] + "\"";
    console.log(searchString + " = searchString");
    //exists now holds all the search criteria
    //eg [classNumberDG,0] and [typeNameDG,3]

    for (i=0;i<trCount;i++){
      var targetCells = targetTrs[i].getElementsByTagName("td");  //find all the cells in the row
      var tdCount = targetCells.length;
=======
    for (i=0;i<targetTrs.length;i++){
     td = targetTrs[i].getElementsByTagName("td")[0];  //find all the cells in the row
      // var tdCount = targetCells.length;
>>>>>>> caab492c4e87e433829178e5710a99197e367fdd

      //assign the value in each cell to a variable, so as to be able to use for comparison
      // var targetClass = targetCells[0].innerText; //value in cell one of the current tr
      // var targetSubject = targetCells[1].innerText; //value in cell two of the current tr
      // var targetTopic = targetCells[2].innerText; //value in cell three of the current tr
      // var targetType = targetCells[3].innerText;  //value in cell four of the current tr
    // alert (targetSubject);

      //if (targetClass === classNumberDG && targetSubject === subjectNameDG && targetTopic === topicNameDG && targetType === typeNameDG) {

        if (td && inputObject.classNumber) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(inputObject.classNumber) > -1) {
            targetTrs[i].style.display = "";
          } else {
            targetTrs[i].style.display = "none";
          }
        }
      // if (searchString) {
      //   targetTrs[i].style.display = "block";
      // }
      // else {
      //   targetTrs[i].style.display = "none";
      // }

    }
<<<<<<< HEAD
console.log (  "if (" + searchString + ")");
=======
    ajaxGetSubForClass();
// console.log (  "if ( " + searchString + ")" );
>>>>>>> caab492c4e87e433829178e5710a99197e367fdd
}

function getAll() {
  location.reload();
}
