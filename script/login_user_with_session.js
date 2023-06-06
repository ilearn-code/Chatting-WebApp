(function() {
    const loginForm = document.querySelector('form[name="login"]');
    
    loginForm.addEventListener('submit', function(event) {
      event.preventDefault();
      
      const username = loginForm.elements.username.value;
      const password = loginForm.elements.password.value;
      
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
          console.log('Login successful');
          console.log('Username:', data.username);
          console.log('Sender ID:', data.sender_id);
          
          // Store session on device
          localStorage.setItem('username', data.username);
          localStorage.setItem('sender_id', data.sender_id);
          
          // Redirect to another page or perform additional actions
          window.location.href = 'index.html';
        }
      })
      .catch(error => {
        // Handle any errors
        console.error('Error:', error);
      });
    });
  })();
  