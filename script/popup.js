function showPopup() {
    // Get the popup container
    const popupContainer = document.getElementById('popupContainer');
    let imageElemntPopUp=document.getElementById('popProfile');
    let popUPName=document.getElementById('namePop');
    let popUPEmail=document.getElementById('emailPop');



    // Set the profile pic and email values (replace with your own values)
    const profilePic = document.getElementById('profilePic');
    imageElemntPopUp.setAttribute('src',localStorage.getItem('img_path'))
  
  popUPName.innerHTML=localStorage.getItem('username');
  popUPEmail.innerHTML=localStorage.getItem('email');
  
    // Show the popup
    popupContainer.style.display = 'block';
  }
  