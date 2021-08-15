const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = () => {
    // get user search value
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        // active class when user start searching
        searchBar.classList.add("active");
    }else {
        // to run setInterval ajax if no active class
        searchBar.classList.remove("active");
    }
    // create XML Object
    let xhr = new XMLHttpRequest();
    // GET method to receive data not to send
    xhr.open("POST", "assets/back/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                // xhr.response give response of that passed URL
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // send user search to php file with ajax
    xhr.send("searchTerm=" + searchTerm);
}

setInterval( () => {
    // create XML Object
    let xhr = new XMLHttpRequest();
    // GET method to receive data not to send
    xhr.open("GET", "assets/back/users.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                // xhr.response give response of that passed URL
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500) // function will run frequently after 500ms