document.getElementById("out").addEventListener("click", (e) => {
    Swal.fire({
        title: "Anda yakin ingin keluar dari halaman ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1786bd",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, keluar!"
    }).then((result) => {
    if (result.isConfirmed) {
        document.location.href="../logout/logout.php"
    }
    });
})

document.getElementById("deleteA1").addEventListener("click", (e) => {
    Swal.fire({
        title: "Anda yakin ingin menghapus Berkas A1?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1786BD",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
    if (result.isConfirmed) {
        document.location.href="./delete/deleteA1.php"
    }
    });
})

document.getElementById("deleteA2").addEventListener("click", (e) => {
    Swal.fire({
        title: "Anda yakin ingin menghapus Berkas A2?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1786BD",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
    if (result.isConfirmed) {
        document.location.href="./delete/deleteA2.php"
    }
    });
})

document.getElementById("deleteA3").addEventListener("click", (e) => {
    Swal.fire({
        title: "Anda yakin ingin menghapus Berkas A3?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1786BD",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
    if (result.isConfirmed) {
        document.location.href="./delete/deleteA3.php"
    }
    });
})
