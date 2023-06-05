   // Add event listener to the submit button to prevent default form submission and send data using fetch API
   document.getElementById("input_user_message_button").addEventListener("click", function (event) {
    event.preventDefault();
    sendData();
   

});

function sendData() {
    const form = document.getElementById("myForm");
    const formData = new FormData(form);
    fetch('php_api/inputmsg.php', {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            console.log(response);
            // If the message was successfully sent to the server, add it to the chat window
            if (response.ok) {
                const message = document.getElementById("input_message_id").value;
                const userDataElement = document.getElementById("user-data");
                
                const sender = senderIdSession;
                const receiver = document.getElementById("receiverIdField").value;
                const messageHtml = `<div class="message self"><p>${message}</p></div>`;
                // If the chat window is currently showing the conversation between the sender and receiver, add the new message to it
                if (sender == receiver) {
                    userDataElement.innerHTML += messageHtml;
                    
                }
                document.getElementById('input_message_id').value = "";
                userDataElement.scrollTop = userDataElement.scrollHeight;
            }
        })
        .catch((error) => {
            console.error("Error sending data:", error);
        });
}
