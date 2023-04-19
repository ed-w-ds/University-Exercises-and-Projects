
    // Clear function
    function resetText() {
        var resetTitle = document.getElementById("title");
        var resetText = document.getElementById("blog-post");
        resetTitle.value = "";
        resetText.value = "";
        title.style.backgroundColor = "white";
        blogText.style.backgroundColor = "white";
    }

    // Select from fields and change them if not filled
    const form = document.getElementById('form');
    const title = document.getElementsByName("title")[0];
    const blogText = document.getElementsByName("blog-post")[0];
    const loginText = document.getElementById("loginText");

    form.addEventListener('submit', function(event) {
        event.preventDefault();
    
        if (title.value === "") {
            var text = document.createTextNode("Enter a title to add a post");
            if (loginText.firstChild) {
                loginText.replaceChild(text, loginText.firstChild);
            } else {
                loginText.appendChild(text);
            }
            loginText.style.textAlign = "center";
            loginText.style.color = "white"; // added line to make the text white
            title.style.backgroundColor = "purple";
        }
        else {
            title.style.backgroundColor = "white";
        }
        
        if (blogText.value === "") {
            var text = document.createTextNode("Enter text to add a post");
            if (loginText.firstChild) {
                loginText.replaceChild(text, loginText.firstChild);
            } else {
                loginText.appendChild(text);
            }
            loginText.style.textAlign = "center";
            loginText.style.color = "white"; // added line to make the text white
            blogText.style.backgroundColor = "purple";
        }
        else {
            blogText.style.backgroundColor = "white";
        }
        
        if (title.value === "" && blogText.value === "") {
            const text = document.createTextNode("Enter title and text to add a post");
            if (loginText.firstChild) {
                loginText.replaceChild(text, loginText.firstChild);
            } else {
                loginText.appendChild(text);
            }
            loginText.style.textAlign = "center";
            loginText.style.color = "white"; // added line to make the text white
            const div = document.getElementById("loginTextDiv");
            div.appendChild(loginText);
        }        
        
        
        if (title.value != "" && blogText.value != ""){
            form.submit();
        }
        
    });

    // add event listener to the clear button, prevetn default prevents from clear button changing style
    const clearButton = document.getElementById("reset");
    clearButton.addEventListener("click", function(event) {
        event.preventDefault();
        resetText();
    });
