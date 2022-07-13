<?php
?>

    <!---login-and-sign-up--------------------------------->
    <div class="form">
        <!--login---------->
        <div class="login-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Log In</strong>
            <!--inputs-->
            <form id="signin">
                <input type="email" name="email" placeholder="Example@gmail.com" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" value="Log In"  />
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="#" class="forget">Forget Your Password?</a>
                <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
            </div>
        </div>
        <!--Sign-up---------->
        <div class="sign-up-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Sign Up</strong>
            <!--inputs-->
            <form id="register">
                <input type="text" name="name" placeholder="Full Name" required/>
                <input type="email" name="email" placeholder="Example@gmail.com" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" value="Sign Up" />
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="javascript:void(0);" class="already-account">
                        Already Have Account?</a>

            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->

<script type="text/javascript">
     
                    
        $("#signin").submit(function(event) {
            event.preventDefault();
            console.log('onsubmit signin');
            /* Act on the event */
            $.ajax({
                url: './user/signin.php',
                type: 'POST',
                dataType: 'html',
                data: $(this).serializeArray(),
            })
            .done(function(response) {
                console.log("success sign",response);
                setTimeout(function() {
                                location.reload();
                            }, 1500);
            })
            .fail(function(data) {
                console.log("fail");
                 alert(JSON.stringify(data));
            })
            .always(function() {
                console.log("complete");
            });
        });
    

        $("#register").submit(function(event) {
            event.preventDefault();
            console.log('onsubmit register');
            /* Act on the event */
            $.ajax({
                url: './user/register.php',
                type: 'POST',
                dataType: 'html',
                data: $(this).serializeArray(),
            })
            .done(function(response) {
                console.log("success register", response);
                 // alert(JSON.stringify(response));

              
            })
            .fail(function(data) {
                console.log("fail",JSON.stringify(data));
                 alert(JSON.stringify(data));
            })
            .always(function() {
                console.log("complete");
            });
        });
        
</script>