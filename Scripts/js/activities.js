function addToPreview(e) {
  var chkArray = [];
  // alert (e);
  document.getElementById("testPreview").innerHTML = "";
  document.getElementById("testPreviewSubmit").innerHTML = "";
  var aa= document.getElementsByTagName("input");
    for (var i =0; i < aa.length; i++){
      if (aa[i].checked) {
        chkArray.push(aa[i].id);
      }
    }
    for (var w=0;w<chkArray.length;w++) {
      var p = document.createElement("p");
      p.value = chkArray[w];
      p.innerText = document.getElementsByName(chkArray[w])[0].innerHTML;
      document.getElementById("testPreview").appendChild(p);
    }
    if (chkArray.length>0) {
      var inpTitle = document.createElement("input");
      inpTitle.type = "text";
      inpTitle.id = "newTestId";
      document.getElementById("testPreviewSubmit").appendChild(inpTitle);
      var b = document.createElement("button");
      b.id = "newTest";
      b.setAttribute("onclick", "ajaxSaveTest()");
      b.innerHTML = "Save";
      document.getElementById("testPreviewSubmit").appendChild(b);

    }
  }

  function deploy(e) {
    var dt = document.getElementsByName(e.id)[0].value;

    alert ("Test Papar " + e.id + " to be deployed on "+dt);
  }
