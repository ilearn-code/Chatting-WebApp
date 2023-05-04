document.getElementById("submitBtn").addEventListener("click", function(event) {
    event.preventDefault();
    sendData();
  });

  function sendData() {
  var formData = new FormData(document.getElementById("myForm"));
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "inputmsg.php", true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(formData);
  document.getElementById('inpmessageid').value = "";
}