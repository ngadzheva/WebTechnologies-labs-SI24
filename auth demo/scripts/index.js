(function() {
    var submitButton = document.getElementById('submit');
    submitButton.addEventListener('click', sendForm);
  
    /**
     * Get the logout button
     */
     var logoutBtn = document.getElementById('logout');
     /**
      * Listen for click event on the logout button
      */
     logoutBtn.addEventListener('click', logout);
  
    // TODO: Send request for getting all students' marks
  })();
  
  function sendForm(event) {
    event.preventDefault();
  
    var firstName = document.getElementById('first-name').value;
    var lastName = document.getElementById('last-name').value;
    var fn = document.getElementById('fn').value;
    var mark = document.getElementById('mark').value;
  
    var data = {
        firstName,
        lastName,
        fn,
        mark
    };
  
  }
  
  function addStudentMark(studentData) {
    var studentTable = document.getElementById('marks');
    var tr = document.createElement('tr');
  
    Object.values(studentData).forEach(function(data) {
        var td = document.createElement('td');
        td.innerHTML = data;
        tr.appendChild(td);
    });
  
    studentTable.appendChild(tr);
  }
  
  function loadStudents(studentsData) {
  }
  
  function handleError(errors) {
  }
  
  /**
  * Handle the click event by sending an asynchronous request to the server
  * @param {*} event
  */
  function logout(event) {
    /**
     * Prevent the default behavior of the clicking the form submit button
     */
  
    /**
     * Send GET request to api.php/logout to logout the user
     */
  }
  
  function redirect() {

  }