const ctx = document.getElementById('myChart').getContext('2d');
const ctx2 = document.getElementById('myChart2').getContext('2d');
const ctx3 = document.getElementById('myChart3').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Selangor', 'Kuala Lumpur'],
        datasets: [{
            label: 'Total User',
            data: [1, 1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive:true,
    }
});

const myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Petaling Jaya', 'Kuala Lumpur'],
        datasets: [{
            label: 'Total User',
            data: [1, 1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive:true,
    }
});

const myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['Selangor', 'Kuala Lumpur'],
        datasets: [{
            label: '# of Votes',
            data: [1,1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive:true,
    }
});