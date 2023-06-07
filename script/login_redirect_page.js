(function() {
    // Check if the user is already logged in
    const storedUsername = localStorage.getItem('username');
    const storedSenderId = localStorage.getItem('sender_id');
    const storedImgPath = localStorage.getItem('img_path');
  
    if (!storedUsername || !storedSenderId || !storedImgPath) {
      // User data is not present, redirect to login page
      console.log('User data not found. Redirecting to login page...');
      window.location.href = 'login.php';
    }
  })();
  