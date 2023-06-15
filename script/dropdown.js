

function toggleDropdown() {
    let dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('show');
  }
  
  window.addEventListener('click', function(event) {
    let dropdown = document.querySelector('.dropdown');
    if (!event.target.matches('.dropdown-button') && !event.target.closest('.dropdown') &&!event.target.closest('.img_n_name') && dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
  });
  
  
  
  