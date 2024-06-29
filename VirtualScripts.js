document.getElementById('checkInForm').addEventListener('submit', function(event) {
  event.preventDefault();

  let patientName = document.getElementById('patientName').value;

  fetch('check_in.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'patientName=' + encodeURIComponent(patientName),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      document.getElementById('statusMessage').innerHTML = 'Checked in successfully!';
      setTimeout(() => {
        window.location.href = 'waiting_room.php'; // Redirect to waiting room page
      }, 2000); // 2 seconds delay before redirecting
    } else {
      document.getElementById('statusMessage').innerHTML = 'Failed to check-in. Please try again.';
    }
  })
  .catch(error => {
    console.error('Error:', error);
    document.getElementById('statusMessage').innerHTML = 'An error occurred. Please try again later.';
  });
});
