<?php
    session_start();
    $_SESSION['nama'] = "";
    $_SESSION['nis'] = "";
    $_SESSION['rayon'] = "";
    $_SESSION['n1'] = "";
    $_SESSION['n2'] = "";
    $_SESSION['n3'] = "";
    $_SESSION['n4'] = "";
    $_SESSION['nilai'] = "";
?>

<!-- HTML Untuk Tempat Menginput Nilai -->
<html>
	<head>
    	<link rel="icon" href="img/beluga-modified.png">
        <link rel="stylesheet" href="style.css">
	    <title>Flowchart</title>
	</head>
	<body>
	<!-- penanganan form dengan method POST -->
		<form method="post" action="flowchart.php" class="input">
            <br>
            <h1 class="flowchart"><span class="typed-text"></span><span class="TypeCursor">&nbsp;</span></h1>
            <hr>
            <label class="nama" style="padding-left:5px ;">Nama Siswa </label>
            <input class="nama" name="nama" type="text" autocomplete="off" required><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
            <label class="nama" style="padding-left:15px ;"> NIS </label>
            <input class="nama" name="nis" type="text" maxlength="8" autocomplete="off" required><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
            <label class="nama" style="padding-left:15px ;"> Rayon </label>
            <input class="nama" name="rayon" type="text" autocomplete="off" required><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
                <br><br>
            <div class="label">
                <label>Masukkan Nilai Tugas</label>
                <input maxlength="3" type="text" name="n1" autocomplete="off" required placeholder="Masukkan Nilai Tugas"><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
                    <br><br>
                <label>Masukkan Nilai Quiz </label>
                <input maxlength="3" type="text" name="n2" autocomplete="off" required placeholder="Masukkan Nilai Quiz" style=" margin-left:6px;"><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
                    <br><br>
                <label>Masukkan Nilai UTS </label>
                <input maxlength="3" type="text" name="n3" autocomplete="off" required placeholder="Masukkan Nilai UTS" style=" margin-left:15px;"><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
                    <br><br>
                <label>Masukkan Nilai UAS  </label>
                <input maxlength="3" type="text" name="n4" autocomplete="off" required placeholder="Masukkan Nilai UAS" style=" margin-left:15px;"><!-- Menggunakan "Required" agar diwajibkan mengisi data -->
                    <br><br>
            </div>
            
            <div class="label">
                <input class="button" type="submit" value="Kirim">
                <br><br>
            </div>
		</form>
        <br>
        <form class="hasil">
        <!-- Php Untuk Memasukkan Nilai -->
        <?php
            // memasukkan data dari Method Post
             if (isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['n3']) && isset($_POST['n4']) && isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])) {
                //ambil biodata
                $nama = $_POST['nama'];
                $nis = $_POST['nis'];
                $rayon = $_POST['rayon'];
                //ambil data nilai
                $n1 = $_POST['n1'];
                $n2 = $_POST['n2'];
                $n3 = $_POST['n3'];
                $n4 = $_POST['n4'];
                $nilai = ($n1 + $n2 + $n3 + $n4)/4;
            }
            // menggunakan if untuk memilih
            if (isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['n3']) && isset($_POST['n4'])) {#isset digunakan agar file tersebut harus diisi terlebih dahulu
                if ($n1 > 100 || $n2 > 100 || $n3 > 100 || $n4 > 100) {
                    echo "<br><b>Anda Jangan Bohong, NILAI CUMAN BISA SAMPAI 100!!!</b><br><br>";
                }else {
                    echo "<br><h3>Nama: $nama</h3>";
                    echo "<h3>NIS: $nis</h3>";
                    echo "<h3>Rombel: $rayon</h3><hr>";
                    echo "<p>Rata-Rata = $nilai </p>";
                    if ($nilai==0){
                        echo "<p>CkCkCk Kamu Jangan Bolos Sekolah Terus Ya!</p>";
                    }elseif ($nilai >= 90){
                        echo "<p>Hebat, Kamu Mencetak Peringkat <b>A</b></p>";
                    }elseif( 80 <= $nilai && $nilai < 90){
                        echo "<p>Mantap, Kamu Mencetak Peringkat <b>B</b></p>";
                    }elseif( 70 <= $nilai && $nilai < 80){
                        echo "<p>Lebih Rajin Lagi Ya, Kamu Mencetak Peringkat <b>C</b></p>";
                    }else{
                        echo "<p>Sayang Sekali Peringkat yang kamu peroleh <b>D</b><br>
                        <i><b>Hati-hati Ibumu mungkin ada di belakangmu!!!</b></i></p>";
                    }
                    //Menggunakan Tenary untuk Menampilkan Kompeten/Tidak Kompeten
                    echo(75 <= $nilai) ? "<b>Selamat Nilai Kamu Kompeten<b><br><br>" : "<b>Sayang Sekali Nilai Kamu Tidak Kompeten<b><br><br>";
                }
            }
        ?>
        </form>
        <button class="button">
            <a class="link" href="../coba/login/action-logout.php">Logout</a>
        </button>
        <br><br>
    <script src="function.js"></script>
	</body>
</html>