<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{
    // variabel global
    global $conn;

    // Silakan buat variabel di bawah dengan data yang diambil dari form
        $studentName = $_POST["stuname"];
        $studentNim = $_POST["stuid"];
        $studentMajor = $_POST["stuclass"];
        $studentYear = $_POST["stuangkatan"];

    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "");

    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "";
        $result = mysqli_query($conn, $query);

        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */
        }
        if (mysqli_affected_rows($conn) > 0) {
            header("Location: add-students.php");
        } else {
            echo "
            <script>
                alert('Data failed');
                document.location.href = add-students.php;
            </script>
            ";
        exit;
    }
}

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    $studentName = $_POST["stuname"];
    $studentNim = $_POST["stuid"];
    $studentMajor = $_POST["stuclass"];
    $studentYear = $_POST["stuangkatan"];

    // Isi query dibawah untuk update data mahasiswa berdasarkan ID
    $query = "UPDATE tb_student SET
            stuname='$studentName',
            stuid='$studentNim',
            stuclass='$studentMajor',
            stuangkatan='$studentYear',
            WHERE id=$id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>