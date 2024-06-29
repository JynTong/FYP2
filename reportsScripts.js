function filterReports() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const reportType = document.getElementById('reportType').value;

    fetch(`filter_reports.php?startDate=${startDate}&endDate=${endDate}&reportType=${reportType}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('reportsTable').innerHTML = data;
        });
}

function exportToCSV() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const reportType = document.getElementById('reportType').value;
    window.location.href = `export_to_csv.php?startDate=${startDate}&endDate=${endDate}&reportType=${reportType}`;
}

function exportToWord() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const reportType = document.getElementById('reportType').value;
    window.location.href = `export_to_word.php?startDate=${startDate}&endDate=${endDate}&reportType=${reportType}`;
}
