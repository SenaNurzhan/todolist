window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

//add form modal window
var addFromModal = document.getElementById("addForm-modal");
var addFromBtn = document.getElementById("add-button");
var addNewBtn = document.getElementById("addForm-button");
var cancelBtn = document.getElementById("cancel-button");

addFromBtn.onclick = function() {
  addFromModal.style.display = "block";
}
cancelBtn.onclick = function() {
  addFromModal.style.display = "none";
}
addNewBtn.onclick = function() {
  addFromModal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == addFromModal) {
    addFromModal.style.display = "none";
  }
}

//old info modal window
var oldInfoModal = document.getElementById("showinfomodal");
var showInfoBtn = document.getElementById("show-info-btn");
var closeBtn = document.getElementById("oldInfo-cls");

showInfoBtn.addEventListener('click', function() {
  oldInfoModal.style.display = "block";
});

closeBtn.addEventListener('click', function() {
  oldInfoModal.style.display = "none";
});

//change style while checkbox
function toggleDone(checkbox) {
  var form = checkbox.closest('.form');
  var tasktitle = form.querySelector('.ls-titl');
  var taskdesc = form.querySelector('.ls-desc');

  if (checkbox.checked) {
    tasktitle.style.textDecoration = "line-through";
    taskdesc.style.textDecoration = "line-through";
  } else {
    tasktitle.style.textDecoration = "none";
    taskdesc.style.textDecoration = "none";
  }
}

//To get value from radio
function getRadioValue(name) {
  var radio = document.getElementsByName(name);

  for (var i = 0; i < radio.length; i++) {
    if (radio[i].checked) {
      return radio[i].value;
    }
  }
}

