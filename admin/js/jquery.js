$(document).ready(function() {
    $('#year').on('change', function() {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        $.ajax({
            url: "process/year_overview.php",
            type: "get",
            data: {
                year: valueSelected
            },
            success: function(result) {
                $(".overlay").show();
                $('#result').html(result);
            }
        });

    });
});
// $(document).ready(function() {
function user_bill(id) {
    $.ajax({
        url: "process/user_bill.php",
        type: "get",
        data: {
            user_id: id
        },
        success: function(user_result) {
            $('#user_bill_detail').html(user_result);
        }
    });
};
// });





let number_array = document.getElementsByClassName('month-data');
let chartData = [];
for (i = 0; i <= 11; i++) {
    let value = number_array[i].textContent;
    chartData.push(value);
}
console.log(chartData);




const ctx = document.getElementById('yearChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
            label: '',
            data: chartData,
            backgroundColor: [
                '#F24052',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                '#A8F387',
                '#16D6FA',
                '#2ACCC8',
                '#F7D6E0',
                '#F2B5D4',
                '#FFEBA5'
            ],
            borderColor: 'transparent',
            borderWidth: 0,
            barThickness: 20

        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});




// upload file
const actualBtn = document.getElementById('item-image');
actualBtn.addEventListener('change', function() {
    document.getElementById('image-upload').innerHTML = this.files[0].name;
})

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('review-image');
        output.style.display = "block";
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};