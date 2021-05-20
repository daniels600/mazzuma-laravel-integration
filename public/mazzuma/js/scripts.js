$(document).ready(function() {

    let orderID = Math.floor(Math.random() * 1000); 

    console.log(orderID);

    $("#orderID").val(orderID);

    //setting the orderID in local storage 
    localStorage.setItem('orderID', orderID);
    

    // jQuery ajax form submit example, runs when form is submitted
    $("#myFormID").submit(function(e) {
        e.preventDefault(); // prevent actual form submit


        var form = $(this);
        //var url = form.attr('action'); //get submit url [replace url here if desired]

        console.log(form.serialize());

        showLoading();
        $.ajax({
            type: "POST",
            url: '/momo',
            data: form.serialize(), // serializes form input
            success: function(data){
                data = JSON.parse(data)
                console.log(data.status)
                if(data.status == 'failed'){
                     
                    Swal.fire({
                        icon: 'warning',
                        title: 'The transaction was not approved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(data.status == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'The transaction was approved successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })

                }else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Transaction failed!',
                        text: 'Something went wrong. Transaction unsuccessful',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    });


    //checking if the delete button is click and display message 
    $("#last_transac").on('click', function(e){
        e.preventDefault();
        let href = $(this).attr('href')

        let id = localStorage.getItem('orderID');

        href = `${href}${id}`;

        console.log(`${href}${id}`);

        $.ajax({
            type: "GET",
            url: href,
            headers: { 'Content-Type': 'application/json', 'Access-Control-Allow-Headers' : '*' },
            success: function(data){
                console.log(data)
            }

        })
        

        // Swal.fire({
        //     icon:'warning',
        //     title: 'Are you sure?',
        //     text: "You won't be able to revert this!",
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, delete it!',
        //     cancelButtonText: 'No, cancel!'
        // }).then((result) => {
        //     if(result.value){
        //         document.location.href = href;
        //     }
            
        // })
    })


    const showLoading = function() {
        Swal.fire({
          title: 'Transaction ongoing',
          text: 'Kindly approve payment confirmation on your phone.',
        //   allowEscapeKey: false,
        //   allowOutsideClick: false,
          timer: 60000,
          didOpen: () => {
            swal.showLoading();
          }
        }).then(
          () => {},
          (dismiss) => {
            if (dismiss === 'timer') {
              console.log('closed by timer!!!!');
              swal({ 
                title: 'Timeout kindly approve transaction',
                type: 'success',
                timer: 2000,
                showConfirmButton: false
              })
            }
          }
        )
    };
    
});







  