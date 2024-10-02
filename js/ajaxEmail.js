const contactForm = document.getElementById("contact-form");


contactForm.addEventListener("submit", function(event) {
    
    event.preventDefault();
    
    var request = new XMLHttpRequest();
    var url = "send-email.php";
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/json");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            var jsonData = JSON.parse(request.response);
            console.log(jsonData);
        }
    };
    var name =  document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    
    
    var data = JSON.stringify({"name": name, "email": email, "subject": subject, "message": message});

    
    request.send(data);

    contactForm.reset();

    document.querySelector('#succesMessage').classList.remove('hide');
});  