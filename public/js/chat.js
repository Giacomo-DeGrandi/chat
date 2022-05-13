
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
                        console.log(d)

                            // Select the node that will be observed for mutations
                            let div2 = document.createElement('div')
                            div2.setAttribute('class','bg-white float-start text-black border-0 rounded-3 p-2 mb-1 shadow-sm w-75')
                            let div3 = document.createElement('div')
                            div3.setAttribute('class','text-fat h3 text-black')
                            let pName = document.createElement('p')
                            pName.innerText = d
                            let pContent = document.createElement('p')
                            pContent.innerText = d
                            let pDate = document.createElement('p')
                            pDate.innerText = d
                            div3.setAttribute('class','text-fat h3 text-black')
                            div2.appendChild(div3)
                            div3.appendChild(pName)
                            div2.appendChild(pContent)
                            div2.appendChild(pDate)
                            messDiv.appendChild(div2);
                            showValids(messCon);
                        })
                    .then(d => {

                        console.log(d)

                        // Options for the observer (which mutations to observe)
                        const config = { attributes: true, childList: true, subtree: true };

                        // Callback function to execute when mutations are observed
                        const callback = function(mutationsList, observer) {
                            // Use traditional 'for loops' for IE 11
                            for(const mutation of mutationsList) {
                                if (mutation.type === 'childList') {
                                    console.log('A child node has been added or removed.');
                                }
                                else if (mutation.type === 'attributes') {
                                    console.log('The ' + mutation.attributeName + ' attribute was modified.');
                                }
                            }
                        };

                        // Create an observer instance linked to the callback function
                        const observer = new MutationObserver(callback);

                        // Start observing the target node for configured mutations
                        observer.observe(div, config);

                        // Later, you can stop observing
                        observer.disconnect();

                    })


            }


    })


    //_______________ LISTEN TO MESSAGE BOARD _______________//





})