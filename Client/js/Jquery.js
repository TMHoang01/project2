     /*-----For Search Bar-----------------------------*/
        $(document).on('click', '.search', function() {
            $('.search-bar').addClass('search-bar-active')
        });

        $(document).on('click', '.search-cancel', function() {
            $('.search-bar').removeClass('search-bar-active')
        });

 
 		        /*---For Login and Sign-up----------------------------*/
        $(document).on('click', '.user,.already-account', function() {
            $('.form').addClass('login-active').removeClass('sign-up-active')
        });

        $(document).on('click', '.sign-up-btn', function() {
            $('.form').addClass('sign-up-active').removeClass('login-active')
        });

        $(document).on('click', '.form-cancel', function() {
            $('.form').removeClass('login-active').removeClass('sign-up-active')
        });


        /*--For-Product-SLider----------------*/
        // $(document).ready(function() {
        //     $('#autoWidth').lightSlider({
        //         autoWidth: true,
        //         loop: true,
        //         onSliderLoad: function() {
        //             $('#autoWidth').removeClass('cS-hidden');
        //         }
        //     });
        // });

        /*--For-make-Menu-responsive------------*/
        $(document).ready(function() {
            $('.toggle').click(function() {
                $('.toggle').toggleClass('active')
                $('.navigation').toggleClass('active')
            })
        });

        // Sign out 
        // $(document).ready(function() {
        //    $('.user-signin').click(function(event) {
        //        /* Act on the event */
        //        $.ajax({
        //            url: './user/logout.php',
        //            type: 'default GET (Other values: POST)',
        //            dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        //            data: {},
        //        })
        //        .done(function() {
        //            console.log("success log out");
        //        })
        //        .fail(function() {
        //            console.log("error");
        //        })
        //        .always(function() {
        //            console.log("complete");
        //        });
               
        //    }); 
        // });


