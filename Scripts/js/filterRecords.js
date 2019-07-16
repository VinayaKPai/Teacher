function filterQuestions() {
  var classNumber = document.getElementById("classNumberDG").value;
  var subjectName = document.getElementById("subjectNameDG").value;
  var topicName = document.getElementById("topicNameDG").value;
  var typeName = document.getElementById("typeNameDG").value;


  var targetTable = document.getElementById("existTable");  //find the table
      targetTable.style.width = "100%";
      targetTable.style.padding = "5px";
      targetTable.style.border.spacing = "2px";
      targetTable.style.border.collapse = "separate";
      targetTable.style.align = 'center';
  var targetTrs = targetTable.getElementsByTagName("tr");   //find all the rows IN THE TABLE
  var trCount = targetTrs.length;                           //count the rows


    var exists = [];  //an array to hold only those incoming variables that are not empty
    var i;    //in tr td loop
    var p;    //in inputArray loop
    var criteria = []; //to build search string
    var cellNameVar;

    var inputArray = [classNumber, subjectName, topicName, typeName]; //an array with all the incoming data
    //check if any of the inputs are null and push into exists if not null
    for (p=0;p<inputArray.length;p++) {
      if (p===0) {cellNameVar = "targetClass";}
      if (p===1) {cellNameVar = "targetSubject";}
      if (p===2) {cellNameVar = "targetTopic";}
      if (p===3) {cellNameVar = "targetType";}
      if (!inputArray[p] == "") {  //if the item has value, we want to use it for searching
        exists.push([inputArray[p],cellNameVar]);
        criteria += (cellNameVar + "===" + inputArray[p]);
        console.log(criteria + " = criteria inside if not");
      }
    }
    console.log(criteria + " = criteria");

    console.log(exists + " = exists");


    var len = exists.length;
    var searchString = "";

    for (z=0;z<len-1;z++) {
      searchString += (exists[z][1] + " == \"" + exists[z][0] + "\" && ");
    }
    searchString += exists[len-1][1] + " == \"" + exists[len-1][0] + "\"";
    console.log(searchString + " = searchString");
    //exists now holds all the search criteria
    //eg [classNumberDG,0] and [typeNameDG,3]

    for (i=0;i<trCount;i++){
      var targetCells = targetTrs[i].getElementsByTagName("td");  //find all the cells in the row
      var tdCount = targetCells.length;

      //assign the value in each cell to a variable, so as to be able to use for comparison
      var targetClass = targetCells[0].innerText; //value in cell one of the current tr
      var targetSubject = targetCells[1].innerText; //value in cell two of the current tr
      var targetTopic = targetCells[2].innerText; //value in cell three of the current tr
      var targetType = targetCells[3].innerText;  //value in cell four of the current tr
    // alert (targetSubject);

      //if (targetClass === classNumberDG && targetSubject === subjectNameDG && targetTopic === topicNameDG && targetType === typeNameDG) {
      if (searchString) {
      targetTrs[i].style.display = "block";
      }
      else {
        targetTrs[i].style.display = "none";
      }

    }
console.log (  "if ( " + searchString + ")" );
}

function getAll() {
  location.reload();
}
