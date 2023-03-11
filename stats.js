const days = document.getElementById("days").value;
let juz_ideals = document.getElementById("juz_ideals").value;
let real_juzes = document.getElementById("real_juz").value;
juz_ideals = JSON.parse(juz_ideals).map((j) => Math.ceil(j * 31));
real_juzes = JSON.parse(real_juzes).filter((j) => j != "");
new_juzes = [];

// filtering real juz and insert empty date
temp_juz = 0;
i = 1;
for (let day of JSON.parse(days)) {
  const rj = real_juzes.filter(j => j['date'] == day);
  if(i > juz_ideals.length) break;

  try {
    temp_juz = rj[0]['juz'];
    temp_date = rj[0]['date'];
    new_juzes.push(temp_juz);
  } catch {
    new_juzes.push(temp_juz);
  }
  i+=1;
}

const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: JSON.parse(days),
    datasets: [
      {
        data: juz_ideals,
        label: "Ideal",
        borderColor: "#3e95cd",
        backgroundColor: "#7bb6dd",
        fill: false,
      },
      {
        data: new_juzes,
        label: "Real",
        borderColor: "#3cba9f",
        backgroundColor: "#71d1bd",
        fill: false,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          display: true,
          ticks: {
            beginAtZero: true,
            steps: 30,
            stepValue: 1,
            max: 30,
          },
        },
      ],
    },
  },
});
