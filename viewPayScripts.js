document.addEventListener("DOMContentLoaded", function() {
    fetch('paid_bills.php')
        .then(response => response.json())
        .then(data => {
            let paymentData = document.getElementById('paymentData');
            data.forEach(payment => {
                let row = document.createElement('tr');

                let billingIDCell = document.createElement('td');
                billingIDCell.textContent = payment.billingID;
                row.appendChild(billingIDCell);

                let billingAmountCell = document.createElement('td');
                billingAmountCell.textContent = payment.billingAmount;
                row.appendChild(billingAmountCell);

                let billingMethodCell = document.createElement('td');
                billingMethodCell.textContent = payment.billingMethod;
                row.appendChild(billingMethodCell);

                let billingReferenceCell = document.createElement('td');
                billingReferenceCell.textContent = payment.billingReference;
                row.appendChild(billingReferenceCell);

                let patientIDCell = document.createElement('td');
                patientIDCell.textContent = payment.patientID;
                row.appendChild(patientIDCell);

                paymentData.appendChild(row);
            });
        });
});
