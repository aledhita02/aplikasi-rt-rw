<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_iuran WHERE id_iuran='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    
    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
        
        $sql_hapus = "DELETE FROM tb_iuran WHERE id_iuran='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            // Menghapus gambar
            $file_path = "assets/bizpage/img/bukti/" . $data_cek['foto'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // echo "<script>
            // Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            // }).then((result) => {
            //     if (result.value) {
            //         window.location = 'index.php?page=data-iuran';
            //     }
            // })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-iuran';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil!', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-iuran';
            }
        })</script>";
    }
}
?>
