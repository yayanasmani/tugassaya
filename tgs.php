<?php
	$koneksi = mysqli_connect("localhost","root","","mahasiswa");
?>

<form method="post">
	<table align="center">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"> </td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim"> </td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><input type="text" name="jurusan"> </td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><input type="text" name="tempatlahir"> </td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="text" name="tanggallahir"> </td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat"> </td>
		</tr>
		<tr>
			<td><input type="submit" value="Tambah Data" name="tambah"> </td>
		</tr>
	</table>

<title>Hasil Input Data Mahasiswa</title>
</form>
<table border="1" align="center">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>NIM</th>
		<th>Jurusan</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$sqlView = "SELECT * from datamahasiswa2";
			$cekView = mysqli_query ($koneksi,$sqlView);
			$nomor =1;
			while ($data=mysqli_fetch_array ($cekView)) {
		?>
			<tr>
				<td><?=$nomor?></td>
				<td><?=$data[1]?></td>
				<td><?=$data[2]?></td>
				<td><?=$data[3]?></td>
				<td><?=$data[4]?></td>
				<td><?=$data[5]?></td>
				<td><?=$data[6]?></td>
				<td>
					<a href="index.php?id_mahasiswa=<?=$data[0]?>">Hapus</a>
				</td>

			</tr>	
				<?php
					$nomor++;
			}
		?>
	</tbody>
</table>

<?php
	if(isset($_POST['tambah'])){
		$sqlInsert ="INSERT INTO `datamahasiswa2` (`nama`, `nim`, `jurusan`, `tempatlahir`, `tanggallahir`, `alamat`) VALUES ('$_POST[nama]','$_POST[nim]','$_POST[jurusan]','$_POST[tempatlahir]','$_POST[tanggallahir]', '$_POST[alamat]')";
		$cekInput=mysqli_query ($koneksi,$sqlInsert);

		if ($cekInput){
			echo "<script> window.location ='index.php'</script>";
		}else{
			echo "data tidak dapat ditambah";
		}
	}
	if(isset($_GET['id_mahasiswa'])){
		$sqlDelete="DELETE FROM datamahasiswa2 WHERE id = '$_GET[id_mahasiswa]'";
		$cekDelete = mysqli_query($koneksi,$sqlDelete);

		if($cekDelete){
			echo "<script> window.location ='index.php'</script>";
		}else{
			echo "data tidak dapat dihapus";
		}
	}
?>