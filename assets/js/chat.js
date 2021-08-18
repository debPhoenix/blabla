const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

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
                scrollToBottom();
            }
        }
    }
    // send form datat through ajax to php
    let formData = new FormData(form); // create new formData Object
    xhr.send(formData); // send the form data to php
}

chatBox.onmouseenter= () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval( () => {
    // create XML Object
    let xhr = new XMLHttpRequest();
    // GET method to receive data not to send
    xhr.open("POST", "assets/back/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                // xhr.response give response of that passed URL
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    // send form data through ajax to php
    let formData = new FormData(form); // create new formData Object
    xhr.send(formData); // send the form data to php
}, 500) // function will run frequently after 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}