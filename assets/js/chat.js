const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

form.onsubmit = (e) => {
    // preventing form from submitting
    e.preventDefault();
}

sendBtn.onclick = () => {
    // create XML Object
    let xhr = new XMLHttpRequest();
    // only pass method, url and async
    xhr.open("POST", "assets/back/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // once inserted msg on database, leave blank input field
            }
        }
    }
    // send form datat through ajax to php
    let formData = new FormData(form); // create new formData Object
    xhr.send(formData); // send the form data to php
}