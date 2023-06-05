(function() {
    fetch('list_user.php')
      .then(response => response.json())
      .then(data => {
        // Process the JSON data
        for (let userId in data) {
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
      })
      .catch(error => {
        // Handle any errors
        console.error(error);
      });
  
    function loadUserData(userId, name, imgPath) {
      // Your code to handle the loadUserData action
    }
  })();
  