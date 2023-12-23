window.addEventListener('beforeunload', () => {
    let XHR = new XMLHttpRequest();

    XHR.onreadystatechange = function () {
        if (this.status === 200) {
            console.log("Session deleted successfully");
        }
    }

    XHR.open('GET', '../CONTROLER/SESSION_DESTROY.php');
    XHR.send();
});

let container = document.querySelector('.main');
document.querySelector('#ENTER').addEventListener('click', function () {

    let inputvalue = document.querySelector('#PLAYERNAME').value;
    let xml = new XMLHttpRequest();

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            console.log(inputvalue);
            window.onbeforeunload = (event => {
                event.preventDefault();
            })
            fetch_questions();
            
        }   
    };

    if (inputvalue.length >= 4) {
        xml.open('POST', '../CONTROLER/SCORE_CONTROLER.php');
        xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xml.send('PLAYERNAME=' + encodeURIComponent(inputvalue));
    }
    else {
        alert('Please Choose A Name with 4 letters at least');
    }

});



function fetch_questions() {
    document.querySelector('.main').innerHTML = '';
    

    let timestamp = document.createElement('div');
    timestamp.classList.add('timer');
    container.appendChild(timestamp);

let count = 5;
timestamp.textContent = count;

    const timer = setInterval(function () {
        count--;
        
        if (count >= 0) {
            timestamp.textContent = count;
        }
        if(count===0) {
            clearInterval(timer);
            let xml = new XMLHttpRequest();

            xml.onload = function () {
                if (this.readyState == 4 && this.status == 200) {
                    container.innerHTML = xml.responseText;
                }
            }
            xml.open('POST', './fetch_questions.php');
            xml.send();
        }
    },1000);

}


function send_ajax_fetch_question() {
    let xml = new XMLHttpRequest();

    xml.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            container.innerHTML = xml.responseText;
        }
    };

    xml.open('POST', './fetch_questions.php');
    xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xml.send('nextButton=');
}

var radioButtons = document.querySelectorAll('.answer-radio');
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('click', function() {
        radioButtons.forEach(function(rb) {
            if (rb !== radioButton) {
                rb.checked = false;
            }
        });
    });
});

function answerid ($id) {
    console.log($id)
}





