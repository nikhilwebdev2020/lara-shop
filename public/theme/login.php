<?php include('partials/header.php') ?>

<?php include('sections/top-nav.php') ?>

<section class="login-wrapper flex justify-center p2">

    <div class="card has-border no-padding m-w-100">

        <div class="card-heading">
            <div class="flex">
                <a href="" class="tab-headings n6 active" data-target="tab1">Sign in</a>
                <a href="" class="tab-headings n6" data-target="tab2">register </a>
            </div>
        </div>
        <div class="card-text">
            <div class="tab active" id="tab1">
                <div class="flex">
                    
                    <input type="text" name="email" class="input" placeholder="Your Email Address">

                    <input type="password" name="password" class="input wrapper" placeholder="Password">

                </div>

                <div class="flex wrapper">
                    <div class="n6">
                        <input type="checkbox" name="remember" class="checkbox">
                        <span>Keep me signed in</span>
                    </div>
                    <div class="n6 text-right">
                        <a href="" class="lost-pwd">Lost your Password?</a>
                    </div>
                </div>

                <div class="flex pt-2">
                    <a href="" class="btn-login w-100 text-center">Login</a>
                </div>
            </div>
            <div class="tab" id="tab2">
                <div class="flex">

                    <input type="text" name="firstName" class="input" placeholder="First Name">

                    <input type="text" name="middleName" class="input" placeholder="Middle Name">

                    <input type="text" name="lastName" class="input" placeholder="Last Name">

                    <input type="text" name="username" class="input" placeholder="Username">

                    <input type="password" name="password" class="input" placeholder="Password">

                    <input type="password" name="confirm_password" class="input" placeholder="Confirm Password">

                    <input type="text" name="city" class="input" placeholder="City">

                    <input type="text" name="phoneNumber" class="input" placeholder="Phone Number">

                    <input type="text" name="address" class="input" placeholder="Address">

                    <?php include('partials/terms.php') ?>

                </div>

                <div class="flex checkbox-wrap pt-2">
                    <input type="checkbox" name="terms" value="1" class="checkbox">
                    <span>I accept the above Terms and Conditions</span>
                </div>

                <div class="flex pt-2">
                    <a href="" class="btn-login w-100 text-center">Sign Up</a>
                </div>
            </div>
        </div>

    </div>

</section>

<?php include('partials/footer.php') ?>

<script>

    function clearActive(classToClear) {

        let tabheadings = document.getElementsByClassName(classToClear);

        for(var i = 0; i < tabheadings.length; i++){

            if ( tabheadings[i].classList.contains('active') ) {
                tabheadings[i].classList.remove('active');
            }

        }

    }

    let tabheadings = document.getElementsByClassName("tab-headings");

    for(var i = 0; i < tabheadings.length; i++){
        tabheadings[i].addEventListener('click', function() {

            event.preventDefault();

            clearActive("tab-headings");
            clearActive("tab");

            this.classList.add('active')

            const tab1 = document.getElementById('tab1');
            const tab2 = document.getElementById('tab2');
            
            if ( this.dataset.target == 'tab1' ) {
                tab1.classList.add('active') 
            }

            if ( this.dataset.target == 'tab2' ) {
                tab2.classList.add('active') 
            }

        })
    }
    
</script>