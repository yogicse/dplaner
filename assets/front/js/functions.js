function addNewItem() {
        var textbox = document.getElementById('MyTextbox');
        var listbox = document.getElementById('MyListbox');
        var newOption = document.createElement('option');
        newOption.value = textbox.value; // The value that this option will have
        newOption.innerHTML = textbox.value; // The displayed text inside of the <option> tags
        listbox.appendChild(newOption);
    }

function deleteItem() {
    var listbox = document.getElementById('MyListbox');
    if (listbox.selectedIndex != -1) {
        listbox.remove(listbox.selectedIndex);
    }
}

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var character = document.getElementById("character");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
    
  // Validate special character
  var schar = /\W|_/g;
  if(myInput.value.match(schar)) {
    character.classList.remove("invalid");
    character.classList.add("valid");
  } else {
    character.classList.remove("valid");
    character.classList.add("invalid");
  }
    
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}