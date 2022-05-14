
document.addEventListener('DOMContentLoaded',function(){

    // SELECT my INS

    // ins sing up
    let actLi = document.querySelector('#activeList');   //.textContent
    let messCon = document.querySelector('#messageContent');
    let sendBtn = document.querySelector('#sendMessage');
    let messBoard = document.querySelector('#messBoard');
    let messDiv = document.querySelector('#messages');

    //_________________________________VALIDATION   FUNCTIONS  _______________________________________///

    //______________  VALIDATION FOR NAMES  ___________//

    const testValidText = () => {
        // initialise my valide condition to false to test the errors
        let isValid = false
        // min num of chars
        let min = 1
        // max num of chars
        let max = 1200
        // take away spaces
        let messVal = messCon.value.trim();

        // test if required function is valid else give an error
        if (!isRequired(messVal)) {
            showErrors(messCon, 'Message can\'t be sent blank')
            // test if the length is at least 3ch and the max is 15ch
        } else if (!isBetween(messVal.length, min, max)) {
            showErrors(messCon, 'Text has to be within 1 and 1200 characters')
            // else validate the input
        } else {
            showValids(messCon)
            isValid = true
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



    ///___________________________________________________________________________________________________///

    // ____________ ADD EVENT LISTENER TO ALL THE INPUTS FROM FORM ____________________________________//

    // Listen to the inputs for callback in both the forms !!!!!!!!!!!!!!

    messBoard.addEventListener('input', function (e) {
        switch (e.target.id) {
            case 'messageContent':
                testValidText();
                break;
        }
    })

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }


    // show Functions __________________________________-

    // Validation showing function if is valid remove the invalid class and add is_valid
    const showValids = (input) => {

        const myDiv = input.parentElement
        myDiv.classList.remove('not_valid')
        myDiv.classList.add('is_valid')
        // select the small as containers and insert the error message as content
        const error = myDiv.querySelector('small');
        error.textContent = '';
    }

    // Error showing function if is invalid remove the valid class and add not_valid
    const showErrors = (input, value) => {

        const myDiv = input.parentElement
        myDiv.classList.remove('is_valid')
        myDiv.classList.add('not_valid')
        // select the small as containers and insert the error message as content
        const error = myDiv.querySelector('small');
        error.textContent = value;
    }

    // interval______________________---

    window.setInterval(updateMsg, 3000);

    let chatn = getCookie('chan');

    let allData = new FormData();

    allData.append('all', chatn)

    function updateMsg(){
        fetch("../../php/controller/chat_controller.php", {
            method: 'POST',
            body: allData,
        })
            .then(r => r.json())
            .then(d =>{

                messDiv.innerHTML = '';

                for(let u=0;u<=d.length;u++){


                    let vu = Object.values(d[u])
                    console.log(vu)
                    let div = document.createElement('div')
                    div.setAttribute('class','bg-light shadow-sm mb-1 p-1')
                    let h3Name = document.createElement('h3')
                    h3Name.setAttribute('class','text-fat')
                    h3Name.innerText = vu[5]
                    let pContent = document.createElement('p')
                    pContent.innerText = vu[3]
                    let pDate = document.createElement('p')
                    pDate.setAttribute('class','text-muted')
                    pDate.innerText = vu[2]

                    messDiv.appendChild(div)
                    div.appendChild(h3Name)
                    div.appendChild(pContent)
                    div.appendChild(pDate)
                    messDiv.appendChild(div);

                }
            })
    }

    // btn_____________________

    sendBtn.addEventListener('click', function(){

            if(testValidText()){

                let plaintext = messCon.value
                let sentBy = sendBtn.value.split(',')

                let textData = new FormData();

                textData.append('messageContent', plaintext)
                textData.append('id', sentBy[0])
                textData.append('channel', sentBy[1])

                fetch("../../php/controller/chat_controller.php", {
                    method: 'POST',
                    body: textData,
                })
                    .then(r => r.json())

                    .then(d =>{

                            let div = document.createElement('div')
                            div.setAttribute('class','bg-light shadow-sm mb-1 p-1')
                            let h3Name = document.createElement('h3')
                            h3Name.setAttribute('class','text-fat')
                            h3Name.innerText = d[0]
                            let pContent = document.createElement('p')
                            pContent.innerText = messCon.value
                            let pDate = document.createElement('p')
                            pDate.setAttribute('class','text-muted')
                            pDate.innerText = d[1]

                            messDiv.appendChild(div)
                            div.appendChild(h3Name)
                            div.appendChild(pContent)
                            div.appendChild(pDate)
                            messDiv.appendChild(div);

                            showValids(messCon);

                        })
            }
    })






})



