function validateForm() {
    const firstName = document.getElementById('firstName').value;
    const userName = document.getElementById('userName').value;
    const email = document.getElementById('email').value;
    const cardName = document.getElementById('cardName').value;
    const cardNumber = document.getElementById('cardNumber').value;
    const expiration = document.getElementById('expiration').value;
    const cvv = document.getElementById('cvv').value;

    if (!firstName || !userName || !email || !cardName || !cardNumber || !expiration || !cvv) {
        alert('Please fill in all required fields.');
        return false;
    }
    return true;
}