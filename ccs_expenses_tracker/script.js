// ===== Expense Chart (Weekly Example) =====
const expenseCtx = document.getElementById("expenseChart");
if (expenseCtx) {
  new Chart(expenseCtx.getContext("2d"), {
    type: "line",
    data: {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      datasets: [{
        label: "Expenses",
        data: [5, 20, 65, 15, 60, 5, 40], // sample data
        borderColor: "rgba(40, 167, 69, 1)",       // Green line
        backgroundColor: "rgba(35, 174, 68, 0.56)", // Light green fill
        fill: true,
        tension: 0.3,
        pointBackgroundColor: "rgba(40, 167, 69, 1)", // Green points
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(40, 167, 69, 1)"
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { labels: { color: "#333" } }
      },
      scales: {
        x: { ticks: { color: "#666" }, grid: { color: "#eee" } },
        y: { ticks: { color: "#666" }, grid: { color: "#eee" } }
      }
    }
  });
}

// ===== Total Expense Chart =====
const totalExpenseCtx = document.getElementById("totalExpenseChart");
if (totalExpenseCtx) {
  new Chart(totalExpenseCtx.getContext("2d"), {
    type: "doughnut",
    data: {
      labels: ["Income", "Outcome"],
      datasets: [{
        data: [
          typeof incomeValue !== "undefined" ? incomeValue : 0,
          typeof outcomeValue !== "undefined" ? outcomeValue : 0
        ],
        backgroundColor: [
          "rgba(39, 167, 69, 0.43)",  // Income = Green
          "rgba(220, 53, 69, 0.7)"   // Outcome = Red
        ],
        borderColor: [
          "rgba(5, 116, 31, 1)",   // Income border green
          "rgba(220, 53, 69, 1)"    // Outcome border red
        ],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { labels: { color: "#333" } }
      }
    }
  });
}




