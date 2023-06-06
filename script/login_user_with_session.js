
    const loginForm = document.querySelector('form[name="login"]');
    
    loginForm.addEventListener('submit', function(event) {

      event.preventDefault();
      
      const username = loginForm.elements.username.value;
      const password = loginForm.elements.password.value;

      console.log(username,password)
      
      fetch('php_api/login_api.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `username=${username}&password=${password}`
      })
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          // Handle login error
          console.log('Login error:', data.error);
        } else {
          // Login success
          console.log(data);
          console.log('Login successful');
          console.log('Username:', data.success.username);
          console.log('Sender ID:', data.success.sender_id);
          
          // Store session on device
          localStorage.setItem('username', data.success.username);
          localStorage.setItem('sender_id', data.success.sender_id);
          
          // Redirect to another page or perform additional actions
          window.location.href = 'index.php';
        }
      })
      .catch(error => {
        // Handle any errors
        console.error('Error:', error);
      });
    });
  
  