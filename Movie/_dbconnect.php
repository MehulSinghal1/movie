<?php
$server="localhost";
$username="root";
$password="";
$database="users";

$conn = mysqli_connect($server,$username,$password,$database);

if ($conn){
    echo"success";
}
else{
    die("Error". mysqli_connect_error());
}

/*?>
<?php
$server="localhost";
$username="root";
$password="";
$database="users";

mysql_connect($host,$username,$password);
mysql_select_db($database);
if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from users where username='".$uname."' AND password='".$password."' limit 1   ";

    $result= mysql_query($sql);

    if(mysql_num_rows($result)==1){

        echo" Success!!";
        exit();

    }
    else{
        echo"Invalid Details!";
        exit();

    }


}

?>
*/