<?php 

// mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}


require 'functions.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('book berhasil dihapus!');
			document.location.href = 'daftar-ebook.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('book gagal ditambahkan!');
			document.location.href = 'daftar-ebook.php';
		</script>
	";
}

?>