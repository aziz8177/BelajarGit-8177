<?php

require_once('DBClass.php');
require_once('m_siswa.php');
require_once('m_nationality.php');

//$id=$_GET['a'];
//$id = (isset($_GET['a'])) ? $_GET['a'] : $_POST['in_nis'];
//if (!is_numeric($id)) && !isset($_POST['kirim']){
//	Exit('Akses Ditolak'); }

$id=$_GET['id'];

$siswa = new Siswa();
$data = $siswa->readSiswa($id);
$nation = new nationality();
$data_nation = $nation->readAllNationality();

if(empty($data)){
	Exit('Data Tidak Tersedia');
}

//print '<pre>';
//print_r($data);
//print '</pre>';
$dt=$data[0];
?>


<h1> Edit Data Siswa</h1>
<form action="editsiswa.php" method="post" enctype="multipart/form-data">
	NIS:<br>
	<input type="text" name="in_nis" value="<?php echo $dt['id_siswa']?>" readonly="true"><br>
	Nama Lengkap:<br>
	<input type="text" name="in_name" value="<?php echo $dt['full_name']?>" readonly="true"><br>
	Email:<br>
	<input type="text" name="in_email" value="<?php echo $dt['email']?>" readonly="true"><br>
	Kewarganegaraan: <br>
	<select name="in_nation" >
		<option value=""> --Pilih Negara-- </option>
		
		<?php foreach($data_nation as $n): ?>
		<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":""?>
		
		<option value="<?php echo $n['id_nationality']?>" <?php echo $s ?>>
			<?php echo $n['nationality']?>
		</option>
		<?php  endforeach  ?>
			
	</select>
	<br>Foto : <input type="file" name="in_foto" ><br>
	<br><br>
	
	<input type="submit" name="kirim" value="Simpan">
 	</form>
	

	<br>
<a href="siswa.php">Kembali</a>