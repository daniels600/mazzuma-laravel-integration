$(document).ready(function () {

    let orderID = Math.floor(Math.random() * 1000);

    console.log(orderID);

    $("#orderID").val(orderID);

    //setting the orderID in local storage 
    localStorage.setItem('orderID', orderID);


    // jQuery ajax form submit example, runs when form is submitted
    $("#myFormID").submit(function (e) {
        e.preventDefault(); // prevent actual form submit


        var form = $(this);
        //var url = form.attr('action'); //get submit url [replace url here if desired]

        console.log(form.serialize());

        showLoading();
        $.ajax({
            type: "POST",
            url: '/momo',
            data: form.serialize(), // serializes form input
            success: function (data) {
                data = JSON.parse(data)
                console.log(data.status)
                if (data.status == 'failed') {

                    Swal.fire({
                        icon: 'warning',
                        title: 'The transaction was not approved',
                        showConfirmButton: true,
                        //timer: 1500
                    }).then((result) => {
                      if(result.value){
                          document.location.href = '/form';
                      }
          
                  })
                } else if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'The transaction was approved successfully',
                        showConfirmButton: true,
                        //timer: 1500
                    }).then((result) => {
                      if(result.value){
                          document.location.href = '/form';
                      }
          
                  })

                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Transaction failed!',
                        text: 'Something went wrong. Transaction unsuccessful',
                        showConfirmButton: true,
                        //timer: 1500
                    }).then((result) => {
                      if(result.value){
                          document.location.href = '/form';
                      }
          
                  })
                }
            }
        });
    });


    //checking if the delete button is click and display message 
    $("#last_transac").on('click', function (e) {
        e.preventDefault();
        let href = $(this).attr('href')

        let id = localStorage.getItem('orderID');

        href = `${href}/${id}`;

        console.log(href);

        $.ajax({
            type: "GET",
            url: href,
            headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Headers': '*'
            },
            success: function (data) {
                data = JSON.parse(data)

                console.log(data['status'])

                if (data['status'] == 'Pending') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Transaction status',
                        text: "Transaction still pending",
                        confirmButtonText: 'Okay',
                        
                    })
                } else if (data['status'] == 'Successful') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Transaction status',
                      text: "Transaction Successful",
                      confirmButtonText: 'Okay',
                      
                    })
                }else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Transaction status',
                      text: "Transaction failed!",
                      confirmButtonText: 'Okay',
                      
                    })
                }
            }

        })

    })


    const showLoading = function () {
        Swal.fire({
            title: 'Transaction ongoing',
            text: 'Kindly approve payment confirmation on your phone.',
            showConfirmButton: true,
            allowEscapeKey: false,
            allowOutsideClick: false,
            timer: 60000,
            didOpen: () => {
                swal.showLoading();
            }
        }).then(

            // () => {},
            // (dismiss) => {
            //     if (dismiss === 'timer') {
            //         console.log('closed by timer!!!!');
            //         swal({
            //             title: 'Timeout kindly approve transaction',
            //             type: 'success',
            //             timer: 2000,
            //             showConfirmButton: false
            //         })
            //     }
            // }
        )
    };


    $("#check_bal").on('click', function (e) {
      e.preventDefault();
      let href = $(this).attr('href')

      Swal.fire({
        title: 'Checking Balance',
        text: 'Please wait...',
        showConfirmButton: true,
        timer: 15000,
        didOpen: () => {
          swal.showLoading();
        }
      });

      $.ajax({
        type: "GET",
            url: href,
            headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Headers': '*'
            },
            success: function (data) {
              console.log(data)
              data = JSON.parse(data)
              console.log(data.balance, data.account_username)

                Swal.fire({
                  title: 'Account Balance',
                  html: `<ul><li><b>Username:</b> ${data.account_username}</li> <li> <b>Account Balance:</b> ${data.balance}</li></ul>`,
                  showConfirmButton: true,
                })
            }
      })


    });

});
