
let intervalId = null;

function loadUserData(userId,selectedUserNAme,imageSrc) {
    // Set the value of the receiver_id input field in the message form
    receiverIdField.value = userId;
    const image_chatting_user=document.getElementById('image_chatting_user');
    image_chatting_user.style.display="block";
    const chatting_user_name=document.getElementById('chatting_user_name');

    image_chatting_user.setAttribute('src',imageSrc);
    chatting_user_name.innerHTML = selectedUserNAme;




    fetch('php_api//getUserData.php?userId=' + userId)
        .then(response => response.json())
        .then(data => {
            const userDataElement = document.getElementById('user-data');
            let messagesHtml = '';
            data.forEach(message => {
                const sender = message.sender_id == userId ? 'other' : 'self';
                messagesHtml += `<div class="message ${sender}">
      <span id="message_${sender}_para">${message.message}</span>
    </div>`;
            });
            userDataElement.innerHTML = messagesHtml;
            userDataElement.scrollTop = userDataElement.scrollHeight;
        })
        .catch(error => {
            console.error('Error retrieving user data:', error);
        });

    // Clear the interval before setting a new one
    if (intervalId) {
        clearInterval(intervalId);
    }

    // Update the chat window periodically
    intervalId = setInterval(() => {
        fetch('getUserData.php?userId=' + userId)
            .then(response => response.json())
            .then(data => {
                const userDataElement = document.getElementById('user-data');
                let messagesHtml = '';
                data.forEach(message => {
                    const sender = message.sender_id == userId ? 'other' : 'self';
                    messagesHtml += `<div class="message ${sender}">
                    <span id="message_${sender}_para">${message.message}</span>
      </div>`;
                });
                userDataElement.innerHTML = messagesHtml;
            })
            .catch(error => {
                console.error('Error retrieving user data:', error);
            });
    }, 1000); // Update every 1 seconds
}
