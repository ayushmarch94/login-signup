function countdown() {
  let timeLeft = 60;
  const countdown = document.getElementById("countdown");
  const timer = setInterval(() => {
    timeLeft--;
    countdown.textContent = timeLeft + "s";

    if (timeLeft <= 0) {
      clearInterval(timer);
      countdown.textContent = "Please reload your page";
    }
  }, 1000);
}
countdown();

document.getElementById("signup-form").addEventListener("submit", function (event) {
    event.preventDefault();
    window.location.href = "./land.html";
});



function generateOTP() {
  let otp = '';
  const characters = '0123456789';
  for (let i = 0; i < 6; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      otp += characters[randomIndex];
  }
  window.alert("your OTP is "+otp);
  return otp;
}

generateOTP()


