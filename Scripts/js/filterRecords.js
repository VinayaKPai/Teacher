function filterQuestions() {
  var classNumber = document.getElementById("classNumber").value;
  var subjectName = document.getElementById("subjectName").value;
  var topicName = document.getElementById("topicName").value;
  var typeName = document.getElementById("typeName").value;


  var targetTable = document.getElementById("existTable");  //find the table

  var targetTrs = targetTable.getElementsByTagName("tr");   //find all the rows IN THE TABLE
  // var trCount = targetTrs.length;                           //count the rows


    var exists = [];  //an array to hold only those incoming variables that are not empty
    var i;    //in tr td loop
    var p;    //in inputArray loop
    var criteria = []; //to build search string
    var cellNameVar;
    var td;

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



    var inputObject = {classNumber: classNumber, subjectName: subjectName, topicName: topicName, typeName: typeName};


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

    for (i=0;i<targetTrs.length;i++){
     td = targetTrs[i].getElementsByTagName("td")[0];  //find all the cells in the row

        if (td && inputObject.classNumber) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(inputObject.classNumber) > -1) {
            targetTrs[i].style.display = "";
          } else {
            targetTrs[i].style.display = "none";
          }
        }

    }

console.log (  "if (" + searchString + ")");
=======
    ajaxGetSubForClass();


}

function getAll() {
  location.reload();
}
