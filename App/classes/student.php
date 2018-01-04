<?php

namespace App\classes;
class student
{
    private function dbConnection(){
        $hostName='localhost';
        $userName='root';
        $password="";
        $bdName='bitm-71';
        $link=mysqli_connect($hostName,$userName,$password,$bdName);
        return$link;
    }

    public function saveStudentInfo($data)
{
//    $link = mysqli_connect('localhost', 'root', '', 'bitm-71');

//    echo '<pre>';
//    print_r($link);

    $sql = "INSERT INTO students (name,email,mobile,price) VALUES ('$data[name]', '$data[email]','$data[mobile]','$data[price]')";
    if (mysqli_query(Student::dbConnection(), $sql)) {
        $message = 'Info saved successfully!!!';
        return $message;
    } else {
        die ('Query problem' . mysqli_error(Student::dbConnection()));
    }
}
public function getAllStudentInfo(){
//    $link = mysqli_connect('localhost', 'root', '', 'bitm-71');
    $sql="SELECT * FROM students";
    if(mysqli_query(Student::dbConnection(),$sql)){
        $queryResult= mysqli_query(Student::dbConnection(),$sql);
        return $queryResult;
//    echo '<pre>';
//    print_r($queryResult);
    }
    else  {
        die ('Query problem' . mysqli_error(Student::dbConnection()));
    }
    }
public function getStudentInfoById($id){
    $sql = "SELECT * FROM students WHERE id='$id'";
    if(mysqli_query(Student::dbConnection(),$sql)){
        $queryResult= mysqli_query(Student::dbConnection(),$sql);
        return $queryResult;
//        echo '<pre>';
//        print_r($queryResult);
    }
    else  {
        die ('Query problem' . mysqli_error(Student::dbConnection()));
    }
}

public function updateStudentInfo($data){
    $sql="UPDATE students SET name='$data[name]',email='$data[email]',mobile='$data[mobile]',price='$data[price]' WHERE id='$data[id]'";
    if(mysqli_query(Student::dbConnection(),$sql)){
        header ('Location: view_student.php');
//        $message = 'Info Updated successfully!!!';
//        return $message;
//        echo '<pre>';
//        print_r($queryResult);
    }
    else  {
        die ('Query problem' . mysqli_error(Student::dbConnection()));
    }
}

public function deleteStudentInfo($id){
$sql="DELETE FROM students WHERE id='$id' ";
    if (mysqli_query(Student::dbConnection(), $sql)) {
        $message = 'Info delete successfully!!!';
        return $message;
    } else {
        die ('Query problem' . mysqli_error(Student::dbConnection()));
    }
}
}