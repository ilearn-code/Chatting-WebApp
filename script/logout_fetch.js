let logout_button = document.getElementById('logout');
logout_button.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('hi');
    fetch('php_api/logout.php')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            localStorage.removeItem('username');
            localStorage.removeItem('sender_id');

            // Redirect to another page or perform additional actions
            window.location.href = 'login.php';
        }


        ).catch(error => console.log(error));

});