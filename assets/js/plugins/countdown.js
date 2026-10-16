var today = new Date();
var tomorrow = new Date(today);
tomorrow.setDate(today.getDate() + 2);
tomorrow.toLocaleDateString();

// Set the date we're counting down to
var countDownDate = new Date(tomorrow).getTime();

// Update the count down every 1 second
var x = setInterval(function () {

	// Get today's date and time
	var now = new Date().getTime();

	// Find the distance between now and the count down date
	var distance = countDownDate - now;

	// Time calculations for days, hours, minutes and seconds
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	// Display the result in the element with id="demo"
	document.getElementById("offer-expired").innerHTML = "<span class='text-danger'>Offer expired in - <b>"+days + " </b>Days <b>" + hours + " </b> Hours <b>"
	+ minutes + "</b> Min <b>" + seconds + "</b> Sec </span>";

	// If the count down is finished, write some text
	/* if (distance < 0) {
		clearInterval(x);
		document.getElementById("offer-expired").innerHTML = "EXPIRED";
	} */
}, 1000);
