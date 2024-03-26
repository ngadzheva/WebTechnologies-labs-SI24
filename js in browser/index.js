window.onload = function () {
    console.log('Loaded')
};

(function () {
    console.log('IIFE loaded')

    const studentsHeader = document.getElementsByTagName('header')[0];
    studentsHeader.innerHTML += ' Marks';

    const deleteHeader = document.getElementById('delete-header');
    console.log(deleteHeader)

    const markTh = document.createElement('th');
    const markText = document.createTextNode('Mark');
    markTh.appendChild(markText);

    markTh.style.color = 'red';

    console.log(markTh)

    deleteHeader.before(markTh);

    const markTd = document.createElement('td');
    markTd.innerText = '6';

    const fnTd = document.querySelector('#fn');
    fnTd.after(markTd);

    console.log(document.getElementsByClassName('student'))

    const deleteBtn = document.querySelector('#delete button');
    deleteBtn.addEventListener('click', deleteStudentRow);

    const addBtn = document.getElementsByName('add')[0];
    addBtn.addEventListener('click', function (event) {
        event.preventDefault();

        addNewStudentRow();
    });
})()

function deleteStudentRow(event) {
    const rowToDelete = event.target.parentNode.parentNode;
    rowToDelete.parentNode.removeChild(rowToDelete);
}

function addNewStudentRow() {
    const inputs = document.querySelectorAll('.student input');

    const student = {};

    inputs.forEach(function (input) {
        student[input.name] = input.value;
    });

    appendStudentTable(student);

    inputs.forEach(function (input) {
        if (input.name !== 'add') {
            input.value = '';
        }
    });
}

function appendStudentTable(student) {
    const firstNameTd = document.createElement('td');
    firstNameTd.innerHTML = student['first-name'];

    const lastNameTd = document.createElement('td');
    lastNameTd.innerHTML = student['last-name'];

    const fnTd = document.createElement('td');
    fnTd.innerHTML = student['fn'];

    const markTd = document.createElement('td');
    markTd.innerHTML = student['mark'];

    const deleteTd = document.createElement('td');
    const deleteBtn = document.createElement('button');
    deleteBtn.innerHTML = 'Delete';
    deleteBtn.addEventListener('click', deleteStudentRow);

    deleteTd.appendChild(deleteBtn);

    const studentTr = document.createElement('tr');
    studentTr.setAttribute('class', 'student');

    studentTr.append(firstNameTd, lastNameTd, fnTd, markTd, deleteTd);

    console.log(studentTr);

    const tbody = document.getElementsByTagName('tbody')[0];
    tbody.append(studentTr);
}