//CLICK EVENT LISTNER SAMPLE
  var numb = 0;
    $(document).ready(function() {$('#one').click(function() {
      numb++;
      $('#two').html("clicked" + numb);}
    );
  })

  //MOUSEENTER AND MOUSE LEAVE (HOVER) EFFECT
  $(document).ready(function(){
    $("div").on({mouseenter: function() {
      $(this).css("background-color", "#AAfAfa");
    },
    mouseleave: function() {
      $(this).css("background-color", "#ffffff")
    }
  });
});

//SEND A REQ TO TEST.PHP ON CLICK OF DIV 3 AND DISPLAY RESPONSE IN DIV
  $(document).ready(function() {$('#three').click(function() {
    //$.GET (LOCATION, CALL BACK FUNCTION WHICH BRINGS THE RESPONSE BACK TO THE PAGE)
    $.get("test.php", function(response) {
      //DISPLAY IN THE SPECIFIC DIV
    $('#four').html(response);  //server response
        });
      }
    );
  })


$.ajax({
  url: 'test.php',
  dataType: 'json',
  cache: false,
  success: function(data, status) {
    $('#five').html(data);//NOTHING IS DISPLAYING
    console.log(data);//NOTHING IS DISPLAYING
    $.each(data,function(index) {
      $('#six').html(data[index]);//NOTHING IS DISPLAYING
      console.log(data[index]);//NOTHING IS DISPLAYING
    });
  },
  error: function(xhr, textStatus, err) {
    console.log(xhr);
    console.log(textStatus);
  }
});
