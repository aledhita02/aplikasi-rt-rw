<?php
if (isset($_GET['kode'])) {
    $id_siskam = $_GET['kode'];

    // Hapus data dari tabel tb_siskam
    $sql_hapus = "DELETE FROM tb_siskam WHERE tb_siskam.id_siskam = '$id_siskam'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-siskam';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-siskam';
                }
            });
        </script>";
    }
}
