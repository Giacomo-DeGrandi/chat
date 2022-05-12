

document.addEventListener('DOMContentLoaded', function(){

    // ins log in
    let formLog = document.querySelector('#formLog');
    let emailLog = document.querySelector('#inputEmail' );
    let pwLog = document.querySelector('#inputPassword');
    let submitLog = document.querySelector('#connect');


    pwLog.addEventListener('input',function(){
        testValidEmailLog();
    })

    //_______________ VALIDATION FOR EMAIL IN CONNECTION  ____________// ------------------>

    const testValidEmailLog = () => {
        // initialise my valid condition to false to test the errors
        let isValid = false

        let emailLogVal = emailLog.value.trim();

        // test if required function is valid else give an error
        if (!isRequired(emailLogVal)) {
            showErrors(emailLog, 'Email can\'t be blank')
            // test if the length is at least 8ch and the max is 35ch
        } else {

            let formData = new FormData();

            formData.append('emailExists', emailLogVal);

            fetch("../../php/controller/user_controller.php", {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data =>{
                    if (data !== 'exists') {
                            showErrors(emailLog, 'This email is not registered, please subscribe to log in')
                            return false;
                    } else {
                        showValids(emailLog)
                    }
                })

            isValid = true;
        }
        return isValid
    }

    // validation TESTS_______________________________-

    // blank
    const isRequired = (value) => {
        if (value === '') {
            return false
        } else {
            return true
        }
    }

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


    submitLog.addEventListener('click', function (event) {

        event.preventDefault()

        let test = testValidEmailLog();
        let pwLogV =  pwLog.value.trim()

        if(test){

            let logData = new FormData();

            logData.append('submitLog', 'true');
            logData.append('inputEmail', emailLog.value);
            logData.append('inputPassword', pwLogV);

            fetch("../../php/controller/user_controller.php", {
                method: 'POST',
                body: logData
            }).then(r => r.json())
                .then(d => {
                    if ( d === 'logged'){
                        window.location = "../../php/view/profil.php";
                    } else {
                        console.log(d)
                    }
                })
        } else {
            testValidEmailLog();
        }
    })


})