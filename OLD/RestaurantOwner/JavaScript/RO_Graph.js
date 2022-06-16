
const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January',
        'February',
        'March',
        'April',
        'May',
        'June'],
        datasets: [{
            label: 'Monthly Profit',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },
   
});


