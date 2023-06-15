function showPopup() {
    // Get the popup container
    const popupContainer = document.getElementById('popupContainer');
  
    // Set the profile pic and email values (replace with your own values)
    const profilePic = document.getElementById('profilePic');
    profilePic.style.backgroundImage = "url('path/to/profile_pic.jpg')";
  
    const email = document.getElementById('email');
    email.textContent = 'user@example.com';
  
    // Show the popup
    popupContainer.style.display = 'block';
  }
  