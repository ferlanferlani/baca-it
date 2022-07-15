<?php 

// koneksi database
$host = "localhost";
$username = "root";
$password = "";
$db = "baca-it";

$conn = mysqli_connect($host, $username, $password, $db);

// query database
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows [] = $row;
    }
    return $rows;
}

// delete ebook
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM ebook WHERE id = $id");
    return mysqli_affected_rows($conn);

}

// upload ebook
function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $pdf = uploadpdf();
    $img = uploadcover();
    if(!$pdf && !$img) {
        return false;
    }

$query = "INSERT INTO ebook VALUES ('', '$judul', '$deskripsi', '$pdf', '$img')";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}


// upload pdf

function uploadpdf() {
    $namaFile = $_FILES['pdf']['name'];
    $ukuranFile = $_FILES['pdf']['size'];
    $error = $_FILES['pdf']['error'];
    $tmpName = $_FILES['pdf']['tmp_name'];

    if( $error === 4) {
        echo"<script>
                alert('pilih gambar terlebih dahulu');
        </script>";
    return false;
    }

    $ektensiPdfValid = ['pdf'];
    $ektensiPdf = strtolower(end($ektensiPdfValid));

    if(!in_array($ektensiPdf, $ektensiPdfValid) ) {
        echo "<script>
            alert('yang kamu upload bukan pdf!');
        </script>";
        return false;
    }


    if ( $ukuranFile > 100000000 ) {
        echo "<script>
            alert('ukuran pdf terlalu besar');
        </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ektensiPdf;

    move_uploaded_file($tmpName, 'pdf/' . $namaFileBaru);
    return$namaFileBaru;



}

// upload cover
function uploadcover() {
	$namaFile = $_FILES['cover']['name'];
	$ukuranFile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	if( $error === 4) {
		echo"<script>
				alert('pilih gambar terlebih dahulu');
		</script>";
	return false;
	}

	$ektensiGambarValid = ['jpg', 'jpeg', 'png' ];
	$ektensiGambar = strtolower(end($ektensiGambarValid));

	if(!in_array($ektensiGambar, $ektensiGambarValid) ) {
		echo "<script>
			alert('yang kamu upload bukan gambar!');
		</script>";
		return false;
	}


	if ( $ukuranFile > 1000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar');
		</script>";
		return false;
	}


	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ektensiGambar;

	move_uploaded_file($tmpName, 'cover/' . $namaFileBaru);
	return$namaFileBaru;


    //function registration 



}

?>