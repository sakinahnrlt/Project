<?php


// Konek Ke database
$conn = mysqli_connect("localhost","root","","itb-stikomambon");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah ($data){
	global $conn;
	//ambil data dari tiap form
		$Kode_Mk 	 	 = htmlspecialchars( $data["Kode_Mk"]);
		$Nama_Mk 		 = htmlspecialchars( $data["Nama_Mk"]);
		$Kelas 	 		 = htmlspecialchars( $data["Kelas"]);
		$Dosen_Pengajar	 = htmlspecialchars( $data["Dosen_Pengajar"]);
		$Ruang	 	 	 = htmlspecialchars( $data["Ruang"]);
		$Hari	 	 	 = htmlspecialchars( $data["Hari"]);
		$SKS	 	 	 = htmlspecialchars( $data["SKS"]);
	
	//query insert data
	$query ="INSERT INTO mata_kuliah 
				VALUE 
				('','$Kode_Mk','$Nama_Mk','$Kelas','$Dosen_Pengajar','$Ruang','$Hari','$SKS')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	

}


function ubah ($data){
	global $conn;
	//ambil data dari tiap form
		$Kode_Mk 	 	 = htmlspecialchars( $data["Kode_Mk"]);
		$Nama_Mk 		 = htmlspecialchars( $data["Nama_Mk"]);
		$Kelas	 	 	 = htmlspecialchars( $data["Kelas"]);
		$Dosen_Pengajar  = htmlspecialchars( $data["Dosen_Pengajar"]);
		$Ruang	 	 	 = htmlspecialchars( $data["Ruang"]);
		$Hari	 	 	 = htmlspecialchars( $data["Hari"]);
		$SKS			 = htmlspecialchars( $data["SKS"]);

	//query insert data
	$query ="UPDATE mata_kuliah SET
			Kode_Mk 	  = '$Kode_Mk',
			Nama_Mk		  = '$Nama_Mk',
			Kelas 	 	  = '$Kelas', 
			Dosen_Pengajar=	'$Dosen_Pengajar', 
			Ruang		  = '$Ruang',
			Hari		  = '$Hari',
			SKS			  = '$SKS',
			WHERE id 	  = '$id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM mata_kuliah WHERE id= $id");

	return mysqli_affected_rows($conn);
}

function cari ($keyword){
	$query = "SELECT * FROM mata_kuliah 
				WHERE
				Kode_Mk 	LIKE '%$keyword%' OR
				Nama_Mk 	LIKE '%$keyword%' 
			";
	return query ($query);
}


function registrasi($data){
	global $conn;
	$username	 = strtolower(stripslashes($data["username"]));
	$password 	 = mysqli_real_escape_string($conn,$data["password"]);
	$password2 	 = mysqli_real_escape_string($conn,$data["password2"]);

	//cek username udah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM user WHERE
						username ='$username'");
	if (mysqli_fetch_assoc($result)){
		echo "<script>
				alert('username sudah terdaftar')
			  </script>
			";
		return false;
	}

	//cek konfirmasi password
	if($password !== $password2){
		echo "<script>
			alert('konfirmasi password tidak sesuai');
			</script>";
		return false;

	}

	//encripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);



	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUE('','$username','$password')");

	return mysqli_affected_rows($conn);

}
?>