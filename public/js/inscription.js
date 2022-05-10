
document.addEventListener('DOMContentLoaded',function(){

    // SELECT my INS

    let user = document.querySelector('#username');   //.textContent
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
    let passwordConf = document.querySelector('#passwordConf');
    let date = document.querySelector('#date');
    let termsBox = document.querySelector('#termsBox');
    let submitSub = document.querySelector('#submitSub');
    let form = document.querySelector('#formSub');

    //_________________________________VALIDATION   FUNCTIONS  _______________________________________///

    //______________  VALIDATION FOR NAMES  ___________//

    const testValidName = () => {
        // initialise my valide condition to false to test the errors
        let isValid = false
        // min num of chars
        let min = 3
        // max num of chars
        let max = 15
        // take away spaces
        let userVal = user.value.trim();

        // test if required function is valid else give an error
        if (!isRequired(userVal)) {
            showErrors(user, 'Username can\'t be blank')
            // test if the length is at least 3ch and the max is 15ch
        } else if (!isBetween(userVal.length, min, max)) {
            showErrors(user, 'Username has to be between 3 and 15 characters')
            // else validate the input
        } else {
            showValids(user)
            isValid = true
        }
        return isValid
    }

    //_______________ VALIDATION FOR EMAILS ____________//

    const testValidEmail = () => {
        // initialise my valid condition to false to test the errors
        let isValid = false
        // min num of chars
        let min = 8
        // max num of chars
        let max = 35
        // take away spaces
        let emailVal = email.value.trim();

        // test if required function is valid else give an error
        if (!isRequired(emailVal)) {
            showErrors(email, 'Email can\'t be blank')
            // test if the length is at least 8ch and the max is 35ch
        } else if (!validateEmail(emailVal) || !isBetween(emailVal.length, min, max)) {
            showErrors(email, 'Email can\'t contain (!#$%^&*), it has to be at least 8ch and 35ch')
        } else {

            let formData = new FormData();

            formData.append('emailExists', emailVal);

            fetch("../../php/ends/email_exists.php", {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data =>{
                    console.log(data)
                    if (data === 'exists') {
                        showErrors(email, 'This email already exists, please choose another one')
                        return false;
                    } else {
                        showValids(email)
                    }
                })

            isValid = true;
        }
        return isValid
    }

    //_______________ VALIDATION FOR PASSWORD ____________//

    const testValidPassword = () => {
        // initialise my valide condition to false to test the errors
        let isValid = false
        // min num of chars
        let min = 8
        // max num of chars
        let max = 50
        // take away spaces
        let passwordVal = password.value.trim();
        // test if required function is valid else give an error
        if (!isRequired(passwordVal)) {
            showErrors(password, 'Password can\'t be blank')
            // test if the length is at least 8ch and the max is 50ch
        } else if (!validatePassword(passwordVal) || !isBetween(passwordVal, min, max)) {
            let myval = 'Password has to be at least 1 lowercase, 1 uppercase, 1 number and has to be between a minimum of 8ch and at max 60ch'
            showErrors(password, myval)
            // else validate the input
        } else {
            showValids(password)
            isValid = true
        }
        return isValid
    }

    //test our values for PASSWORD CONFIRMATION______________________________

    const testPasswordConfirmation = () => {
        // initialise my valide condition to false to test the errors
        let isValid = false

        // take away spaces
        let passwordConfVal = passwordConf.value.trim();        // take away spaces
        let passwordVal = password.value.trim();
        // test if required function is valid else give an error
        if (!isRequired(passwordConfVal)) {
            showErrors(passwordConf, 'Password Confirmation can\'t be blank')
            // test if the length is at least 8ch and the max is 50ch
        } else if (passwordVal !== passwordConfVal) {
            showErrors(passwordConf, 'Password and its confirmation \n have to be identical')
            // else validate the input
        } else {
            showValids(passwordConf)
            isValid = true
        }
        return isValid
    }


    const testValidTerms = () => {
        // initialise my valid condition to false to test the errors

    }


    const testValidDate = () => {
        // initialise my valide condition to false to test the errors
        let isValid = false
        // take away spaces
        let dateVal = date.value

        // test if required function is valid else give an error
        if (!isRequired(dateVal)) {
            showErrors(date, 'Email can\'t be blank')
            // test if the length is at least 8ch and the max is 35ch
        } else if (!validateDate(dateVal)) {
            showErrors(date, 'You need to be at least 18 to subscribe!')
        } else {
            showValids(date)
            isValid = true;
        }
        return isValid
    }


    // _____________________    VALIDATION TESTS INPUTS ________________________//


    // validation TESTS_______________________________-

    // blank
    const isRequired = (value) => {
        if (value === '') {
            return false
        } else {
            return true
        }
    }
    // long
    const isBetween = (length, min, max) => {
        if (length < min || length > max) {
            return false
        } else {
            return true
        }
    }
    // email regex
    const validateEmail = (email) => {
        const re = /^[a-z0-9._-]+[@]+[a-zA-Z0-9._-]+[.]+[a-z]{2,3}$/   //  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/   //     /^[a-z0-9._-]+[@]+[a-zA-Z0-9._-]+[.]+[a-z]{2,3}$/    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    // password regex
    const validatePassword = (password) => {
        const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
        return re.test(password);
    };

    // validate Terms
    const validateTerms = (value) => {
        console.log(value)
    };

    // date
    const validateDate = (value) => {

        let dateVal = value
        dateVal.split('/')
        let y = dateVal[0]
        let m = dateVal[1]
        let d = dateVal[2]

        console.log(value);

        let testDate = new Date();

        let testY = testDate.getFullYear();
        let testM = testDate.getMonth();
        let testD = testDate.getDate();

        if((testY-18) )

        console.log(testY-18,testM,testD)



    }






    ///___________________________________________________________________________________________________///

    // ____________ ADD EVENT LISTENER TO ALL THE INPUTS FROM FORM ____________________________________//

    // Listen to the inputs for callback

    form.addEventListener('input', function (e) {

        switch (e.target.id) {
            case 'username':
                testValidName();
                break;
            case 'email':
                testValidEmail();
                break;

                /*

            case 'termsBox':
                testValidTerms();
                break;


                 */
            case 'date':
                testValidDate();
                break;
            case 'password':
                testValidPassword();
                break;
            case 'passwordConf':
                testPasswordConfirmation();
                break;
        }

    })


    // show Functions __________________________________-

    // Validation showing function if is valid remove the invalid class and add is_valid
    const showValids = (input) => {
        const myForm = input.parentElement
        myForm.classList.remove('not_valid')
        myForm.classList.add('is_valid')
        // select the small as containers and insert the error message as content
        const error = myForm.querySelector('small');
        error.textContent = '';
    }

    // Error showing function if is invalid remove the valid class and add not_valid
    const showErrors = (input, value) => {
        const myForm = input.parentElement
        myForm.classList.remove('is_valid')
        myForm.classList.add('not_valid')
        // select the small as containers and insert the error message as content
        const error = myForm.querySelector('small');
        error.textContent = value;
    }



})