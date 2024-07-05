document.getElementById('availabilityForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;
    // Logika untuk cek ketersediaan kamar (disini kita hanya menampilkan pesan sederhana)
    document.getElementById('availabilityResult').textContent = `Rooms are available from ${checkin} to ${checkout}`;
});


