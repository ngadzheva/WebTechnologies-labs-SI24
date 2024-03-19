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

    console.log(markTh)

    deleteHeader.before(markTh);
})()
