(function () {
  let imageElement = document.getElementById('login_user_image_id');



  imageElement.setAttribute('src', localStorage.getItem('img_path'));

  // console.log(localStorage.getItem('img_path'));
  let userNameElement = document.getElementById('userName');
  const storedUsername = localStorage.getItem('username');
  const capitalizedUsername = storedUsername.charAt(0).toUpperCase() + storedUsername.slice(1);
  userNameElement.textContent = capitalizedUsername;


  fetch('php_api/list_user.php')
    .then(response => response.json())
    .then(data => {
      // Process the JSON data

      for (let userId in data) {
        if (senderIdSession != userId) {
          let user = data[userId];
          let name = user.name;
          let imgPath = user.img_path;

          // Create HTML elements
          let link = document.createElement('a');
          link.addEventListener('click', () => loadUserData(userId, name, imgPath));

          let userDiv = document.createElement('div');
          userDiv.className = 'listuser';

          let image = document.createElement('img');
          image.src = imgPath;

          let strong = document.createElement('strong');
          strong.id = 'nn';
          strong.textContent = name;

          // Append elements to the DOM
          link.appendChild(userDiv);
          userDiv.appendChild(image);
          userDiv.appendChild(strong);

          // Append the link to the listscroll div
          document.querySelector('.listscroll').appendChild(link);
        }
      }
    })
    .catch(error => {
      // Handle any errors
      console.error("ERROR", error);
    });


  // Your code to handle the loadUserData action

})();
