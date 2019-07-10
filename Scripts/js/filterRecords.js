function filterQuestions() {
  var classNumberDG = document.getElementById("classNumberDG").value;
  var subjectNameDG = document.getElementById("subjectNameDG").value;
  var topicNameDG = document.getElementById("topicNameDG").value;
  var typeNameDG = document.getElementById("typeNameDG").value;

  var targetTable = document.getElementById("existTable");  //find the table
      targetTable.style.width = "100%";
      targetTable.style.padding = "5px";
      targetTable.style.border.spacing = "2px";
      targetTable.style.border.collapse = "separate";
      targetTable.style.align = 'center';
  var targetTrs = targetTable.getElementsByTagName("tr");   //find all the rows
  var trCount = targetTrs.length;                           //count the rows
  for (i=0;i<trCount;i++){
    var targetCells = targetTrs[i].getElementsByTagName("td");  //find all the cells in the row
    var tdCount = targetCells.length;

    // alert (targetCells[0].innerText);
    var targetClass = targetCells[0].innerText;
    var targetSubject = targetCells[1].innerText;
    var targetTopic = targetCells[2].innerText;
    var targetType = targetCells[3].innerText;
    // alert (targetSubject);
    if (targetClass === classNumberDG && targetSubject === subjectNameDG && targetTopic === topicNameDG && targetType === typeNameDG) {
      targetTrs[i].style.display = "block";

    }
    else {
      targetTrs[i].style.display = "none";
    }

  }

}

function getAll() {
  location.reload();
}
