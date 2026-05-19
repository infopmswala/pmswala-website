var P, R, N, pie, line;
var loan_amt_slider = document.getElementById("loan-amount");
var int_rate_slider = document.getElementById("interest-rate");
var loan_period_slider = document.getElementById("loan-period");

// Define the conversion rate from INR to USD
const conversionRate = 83.94;

// Update loan amount
if (loan_amt_slider) {
	loan_amt_slider.addEventListener("input", (self) => {
		document.querySelector("#loan-amt-text").innerText =
			"₹" + parseInt(self.target.value).toLocaleString("en-IN") + " / $" + (parseFloat(self.target.value) / conversionRate).toFixed(2).toLocaleString("en-US");
		P = parseFloat(self.target.value);
		displayDetails();
	});
}

// Update Rate of Interest
if (int_rate_slider) {
	int_rate_slider.addEventListener("input", (self) => {
		document.querySelector("#interest-rate-text").innerText =
			self.target.value + "%";
		R = parseFloat(self.target.value);
		displayDetails();
	});
}

// Update loan period
if (loan_period_slider) {
	loan_period_slider.addEventListener("input", (self) => {
		document.querySelector("#loan-period-text").innerText =
			self.target.value + " years";
		N = parseFloat(self.target.value);
		displayDetails();
	});
}

// Calculate total Interest payable
function calculateLoanDetails(p, r, num) {
	let totalInterest = 0;
	let yearlyInterest = [];
	let yearPrincipal = [];
	let years = [];
	let year = 1;
	let [counter, principal, interes] = [0, 0, 0];
	while (p > 0) {
		let interest = parseFloat(p) * parseFloat(r);
		p = parseFloat(p) - (parseFloat(num) - interest);
		totalInterest += interest;
		principal += parseFloat(num) - interest;
		interes += interest;
		if (++counter == 12) {
			years.push(year++);
			yearlyInterest.push(parseInt(interes));
			yearPrincipal.push(parseInt(principal));
			counter = 1;
		}
	}
	line.data.datasets[0].data = yearPrincipal;
	line.data.datasets[1].data = yearlyInterest;
	line.data.labels = years;
	return totalInterest;
}

// Calculate and display details
function displayDetails() {
// 	let r = parseFloat(R) / 100;
// 	let n = parseFloat(N) * 12;
// 	let num = P * Math.pow(1 + R / 100, N);
// 	let payabaleInterest = calculateLoanDetails(P, r);
// 	let monthlyInterest = payabaleInterest / n;
	
	let r = parseFloat(R) / 12 / 100; // monthly interest rate
    let n = parseFloat(N) * 12;

    let monthlyInterest = (P * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1); // EMI
    let totalPayment = monthlyInterest * n;
    let payabaleInterest = totalPayment - P;

	
	let opts = '{style: "decimal", currency: "IN"}';

	// Display the loan details in both INR and USD
	document.querySelector("#cp").innerText =
		"₹" + parseFloat(P).toLocaleString("en-IN", opts) + 
		" / $" + (parseFloat(P) / conversionRate).toFixed(2).toLocaleString("en-US");

	document.querySelector("#ci").innerText =
		"₹" + parseFloat(payabaleInterest).toLocaleString("en-IN", opts) + 
		" / $" + (parseFloat(payabaleInterest) / conversionRate).toFixed(2).toLocaleString("en-US");

	document.querySelector("#ct").innerText =
		"₹" + parseFloat(parseFloat(P) + parseFloat(payabaleInterest)).toLocaleString("en-IN", opts) +
		" / $" + ((parseFloat(P) + parseFloat(payabaleInterest)) / conversionRate).toFixed(2).toLocaleString("en-US");

	document.querySelector("#price").innerText =
		"₹" + parseFloat(monthlyInterest).toLocaleString("en-IN", opts) + 
		" / $" + (parseFloat(monthlyInterest) / conversionRate).toFixed(2).toLocaleString("en-US");

	pie.data.datasets[0].data[0] = P;
	pie.data.datasets[0].data[1] = payabaleInterest;
	pie.update();
	line.update();
}

// Initialize everything
function initialize() {
	document.querySelector("#loan-amt-text").innerText =
	"₹" + parseInt(loan_amt_slider.value).toLocaleString("en-IN")+" / $" + (parseFloat(loan_amt_slider.value) / conversionRate).toFixed(2).toLocaleString("en-US")  ;
	P = parseFloat(document.getElementById("loan-amount").value);

	document.querySelector("#interest-rate-text").innerText =
		int_rate_slider.value + "%";
	R = parseFloat(document.getElementById("interest-rate").value);

	document.querySelector("#loan-period-text").innerText =
		loan_period_slider.value + " years";
	N = parseFloat(document.getElementById("loan-period").value);

	line = new Chart(document.getElementById("lineChart"), {
		data: {
			datasets: [
				{
					type: "line",
					label: "Yearly Principal paid",
					borderColor: "rgb(54, 162, 235)",
					data: []
				},
				{
					type: "line",
					label: "Yearly Interest paid",
					borderColor: "rgb(255, 99, 132)",
					data: []
				}
			],
			labels: []
		},
		options: {
			plugins: {
				title: {
					display: true,
					text: "Yearly Payment Breakdown"
				}
			},
			scales: {
				x: {
					title: {
						color: "grey",
						display: true,
						text: "Years Passed"
					}
				},
				y: {
					title: {
						color: "grey",
						display: true,
						text: "Money in Rs."
					}
				}
			}
		}
	});

	pie = new Chart(document.getElementById("pieChart"), {
		type: "doughnut",
		data: {
			labels: ["Principal", "Interest"],
			datasets: [
				{
					label: "Home Loan Details",
					data: [0, 0],
					backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 99, 132)"],
					hoverOffset: 4
				}
			]
		},
		options: {
			plugins: {
				title: {
					display: true,
					text: "Payment Breakup"
				}
			}
		}
	});
	displayDetails();
}
initialize();
