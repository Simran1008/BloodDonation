var btn1 = document.getElementById('addSelect');
var btn2 = document.getElementById('addInput');
var selectContainer = document.getElementById('selectContainer');
var inputContainer = document.getElementById('inputContainer');

var searchButton = document.querySelector('#searchButton');
var h4 = document.createElement('h4');

// Function to add a select element
btn1.addEventListener('click', function() {
    selectContainer.innerHTML = '';
    inputContainer.innerHTML = '';

    h4.innerHTML = '<h4>Select blood group</h4>';

    var newSelect = document.createElement('select');
    newSelect.name = 'select';
    
    newSelect.innerHTML += '<option value="A+" name="A+">A+</option> <option value="A-" name="A-">A-</option>';
    newSelect.innerHTML += '<option value="B+" name="B+">B+</option> <option value="B-" name="B-">B-</option>';
    newSelect.innerHTML += '<option value="O+" name="O+">O+</option> <option value="O-" name="O-">O-</option>';
    newSelect.innerHTML += '<option value="AB+" name="AB+">AB+</option> <option value="AB-" name="AB-">AB-</option>';

    selectContainer.appendChild(h4);
    selectContainer.appendChild(newSelect);
    searchButton.style.visibility = 'visible';
});

// Function to add an input element
btn2.addEventListener('click', function() {
    selectContainer.innerHTML = '';
    inputContainer.innerHTML = '';

    h4.innerHTML = '<h4>Enter city</h4>';

    var newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'input';

    inputContainer.appendChild(h4);
    inputContainer.appendChild(newInput);
    searchButton.style.visibility = 'visible';
});


var contactLink = document.querySelector('#contactLink');
var contact = document.querySelector('#contact');

contactLink.addEventListener('click', function(){
    if (contact.style.visibility === 'hidden'){
        contact.style.visibility = 'visible';
    }
    else{
        contact.style.visibility = 'hidden';
    }
})