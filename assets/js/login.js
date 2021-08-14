const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorTxt = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    // preventing form from submitting
    e.preventDefault();
}

continueBtn.onclick = () => {
    // create XML Object
    let xhr = new XMLHttpRequest();
    // only pass method, url and async
    xhr.open("POST", "assets/back/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                // xhr.response give response of that passed URL
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorTxt.style.display = "block";
                    errorTxt.textContent = data;
                }
            }
        }
    }
    // send form datat through ajax to php
    let formData = new FormData(form); // create new formData Object
    xhr.send(formData); // send the form data to php
}