function resolveAfter2Seconds(x) {
    return new Promise(resolve => {
      setTimeout(() => {
        resolve(x);
      }, 2000);
    });
  };

$('#bulk_options_form_submit').submit(function(event){
    
    var numberOfChecked = $('input:checkbox:checked').length;
    
    if(numberOfChecked) 
    {    
        var selected_value = $('#bulk_options_dropdown').val();

        if(selected_value == 'delete') {

            let text = "Press a button!\nEither OK or Cancel.";
            if (confirm(text) == true) {
                return true;
            } else {
                return false;
            }


            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "Are you sure you want to delete this record!",
            //     type: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes!',
            //     confirmButtonClass: 'btn btn-success',
            //     cancelButtonClass: 'btn btn-danger ml-1',
            //     buttonsStyling: false,
            //     closeOnConfirm: true,
            // }).then((result) => {
            //     return true;
            // })
        } 
    } 
    else 
    {
        Swal.fire({
            title: "Error",
            html: "Error Occured<br><br> select record ",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false
        });

        event.preventDefault();
    }
});

function delete_record(url) {
    
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to delete this record!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            
            window.location.href = url;
        }
    })
}
