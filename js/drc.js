document.addEventListener("DOMContentLoaded", function () {
	if(pageObj.hasCounter){
		const countDownDate = new Date(pageObj.counterLimitDate).getTime();

		let x = setInterval(function() {
			const now = new Date().getTime();
			const distance = countDownDate - now;
			const days = Math.floor(distance / (1000 * 60 * 60 * 24));
			const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((distance % (1000 * 60)) / 1000);

			document.querySelector('#counterDays').innerHTML = days;
			document.querySelector('#counterHours').innerHTML = hours;
			document.querySelector('#counterMinuts').innerHTML = minutes;
			document.querySelector('#counterSeconds').innerHTML = seconds;

			// If the count down is finished, write some text
			if (distance < 0) {
			  clearInterval(x);
			  document.getElementById("demo").innerHTML = "EXPIRED";
			}
		  }, 1000);
	}
})