    var data_fo = $('.add-field').html();
    var sd = '<div class="remove-add-more">Remove</div>';
    var data_combine = data_fo.concat(sd);
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".user"); //Fields wrapper
    var add_button = $(".add-more"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append(data_combine); //add input box
        $(wrapper).append('<div class="remove-add-more">Remove</div>')
      }
    console.log(data_fo);
    });

    $(wrapper).on("click",".remove-add-more", function(e){ //user click on remove text
        e.preventDefault();
        $(this).prev('.user').remove();
        $(this).remove();
        x--;
    })