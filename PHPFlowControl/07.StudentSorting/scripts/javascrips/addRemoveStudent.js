var studentId = {id: 1};
var addBtn = document.getElementById('add');

addBtn.addEventListener('click', function(){
    var studentsSection = document.getElementById('students');
    var student = document.createElement('div');
    studentId.id++;

    student.setAttribute('id', 'student' + studentId.id);
    studentsSection.appendChild(student);
    $(student).load('htmlFiles/newStudent.html');
});

function removeStudent(element, studentId){
    var parentNode = element.parentNode;
    var studentsSection = document.getElementById('students');
    var students = studentsSection.getElementsByTagName('div');
    if(students.length > 1){
        var studentToRemoveId = parentNode.getAttribute('id');
        var student = document.getElementById(studentToRemoveId);
        studentsSection.removeChild(student);
        for(var studentIndex = 0; studentIndex < students.length; studentIndex++){
            var id = 'student' + (studentIndex + 1);
            students[studentIndex].removeAttribute('id');
            students[studentIndex].setAttribute('id', id);
        }
        studentId.id--;
    }
}