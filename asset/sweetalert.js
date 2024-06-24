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