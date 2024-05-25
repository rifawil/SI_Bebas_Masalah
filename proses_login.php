<?php
include('koneksi.php');     
        
$user = $_POST['username'];
$pass = ($_POST['password']);
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysqli_error($koneksi));
        if(mysqli_num_rows($sql) == 0)  
    {
    echo '<script language="javascript">alert("Username atau Password salah"); document.location="Login.html";</script>';
    }
    else
        {
        $row = mysqli_fetch_assoc($sql);
        session_start();
        if($row['role'] == 'Admin')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Admin';
        header("Location: Admin/admin.php");
        }
        else if($row['role'] == 'Mahasiswa')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Mahasiswa';
        header("Location: Mahasiswa/mahasiswa.php");
        }           
        else if($row['role'] == 'Admin TA')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Admin TA';
        header("Location: index.html");
        }
        else if($row['role'] == 'Perpustakaan')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Perpustakaan';
        header("Location: index.html");
        }
        else if($row['role'] == 'Keuangan')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Keuangan';
        header("Location: index.html");
        }
        else if($row['role'] == 'Kajur Elektro')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Kajur Elektro';
        header("Location: index.html");
        }
        else if($row['role'] == 'Kajur Mesin')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='Kajur Mesin';
        header("Location: index.html");
        }
    else
{
    echo '<script language="javascript">alert("Username atau Password salah"); document.location="index.html";</script>';
}
}
?>