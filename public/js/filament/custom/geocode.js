document.addEventListener('DOMContentLoaded', function () {
    const alamat = document.querySelector('input[name="lokasi"]');
    const lat = document.querySelector('input[name="latitude"]');
    const lng = document.querySelector('input[name="longitude"]');
  
    if (alamat && lat && lng) {
      alamat.addEventListener('blur', function () {
        const lokasi = alamat.value;
        if (lokasi.length < 4) return;
  
        fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(lokasi)}&key=${window.GOOGLE_API_KEY}`)
          .then(res => res.json())
          .then(data => {
            if (data.status === 'OK') {
              const lokasi = data.results[0].geometry.location;
              lat.value = lokasi.lat;
              lng.value = lokasi.lng;
            } else {
              alert('Alamat tidak ditemukan.');
            }
          })
          .catch(() => alert('Gagal menghubungi Google Maps.'));
      });
    }
  });