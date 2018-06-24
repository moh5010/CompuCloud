$( document ).ready(function() {
    $.get(OC.generateUrl('/apps/ownnotes/api/computers/sold'), function(data) {
      var companies = [];
      var sold = [];
      for (i = 0; i < data.length; i++) {
        companies.push(data[i].computer_company);
      }
      companies.sort()
      var a = [], prev;

      for (i = 0; i < companies.length; i++) {
        if ( companies[i] !== prev ) {
          a.push(companies[i]);
          sold.push(1);
        } else {
          sold[sold.length-1]++;
        }
        prev = companies[i];
      }
      companies = a;
      console.log(companies);
      console.log(sold);
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              //labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
              labels: companies,
              datasets: [{
                  label: '# of computers sold',
                  //data: [12, 19, 3, 5, 2, 3],
                  data: sold,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 220, 190, 0.2)',
                      'rgba(255, 100, 120, 0.2)',
                  ],
                  borderColor: [
                      'rgba(0,0,0,1)',
                      'rgba(0, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 220, 90, 1)',
                      'rgba(255, 100, 120, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
    });
});
