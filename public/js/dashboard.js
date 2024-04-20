//  global Chart:false, feather:false

function getPaymentRecieved(payment) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('paymentReceived')
  // eslint-disable-next-line no-unused-vars
  var createdUsers = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: payment,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}
var months = [
  'January',
  'February ',
  'March ',
  'April ',
  'May ',
  'June ',
  'July ',
  'August',
  'September',
  'October ',
  'November ',
  'December'
];


function getCreatedUsers(users) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('createdUsers')
  // eslint-disable-next-line no-unused-vars
  var createdUsers = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: users,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}


function getRedeemedOffers(useroffers) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('redeemedOffers')
  // eslint-disable-next-line no-unused-vars
  var useroffers = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: useroffers,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}



function getUserSaving(userSaving) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('moneySaved')
  // eslint-disable-next-line no-unused-vars
  var useroffers = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: userSaving,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}



//merchant analytics down




function getBuy1get1(buy1get1) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('buyonegetone')
  // eslint-disable-next-line no-unused-vars
  var buy1getone = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: buy1get1,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}






function getDiscountRecieved(discount) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('discount')
  // eslint-disable-next-line no-unused-vars
  var discount1 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: discount,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}






function  getall(all) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('total')
  // eslint-disable-next-line no-unused-vars
  var all1 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        data: all,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#686869',
        borderWidth: 4,
        pointBackgroundColor: '#686869'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}