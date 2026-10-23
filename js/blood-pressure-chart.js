/**
 * Blood pressure line chart (Chart.js).
 */
(function (TechCare) {
  'use strict';

  const { shortMonth } = TechCare.utils;

  const COLORS = {
    systolic: '#E66FD2',
    diastolic: '#8C6FE6',
    grid: '#CBC8D4',
    text: '#072635',
  };

  /** Number of most recent readings shown ("Last 6 months"). */
  const MONTHS_SHOWN = 6;

  let chartInstance = null;

  /**
   * The API lists diagnosis history newest-first, so take the first N entries
   * and reverse them for a left-to-right chronological chart.
   */
  function lastMonths(history, count = MONTHS_SHOWN) {
    return history.slice(0, count).reverse();
  }

  function dataset(label, data, color) {
    return {
      label,
      data,
      borderColor: color,
      backgroundColor: color,
      pointBackgroundColor: color,
      pointBorderColor: '#FFFFFF',
      pointBorderWidth: 1,
      pointRadius: 6,
      pointHoverRadius: 7,
      borderWidth: 2,
      tension: 0.4,
    };
  }

  function render(canvas, history) {
    if (typeof Chart === 'undefined') {
      throw new Error('Chart.js failed to load');
    }

    const readings = lastMonths(history);
    const labels = readings.map((entry) => `${shortMonth(entry.month)}, ${entry.year}`);
    const systolic = readings.map((entry) => entry.blood_pressure.systolic.value);
    const diastolic = readings.map((entry) => entry.blood_pressure.diastolic.value);

    if (chartInstance) chartInstance.destroy();

    Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
    Chart.defaults.color = COLORS.text;

    chartInstance = new Chart(canvas, {
      type: 'line',
      data: {
        labels,
        datasets: [
          dataset('Systolic', systolic, COLORS.systolic),
          dataset('Diastolic', diastolic, COLORS.diastolic),
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
          legend: { display: false }, // custom legend is rendered next to the chart
          tooltip: { usePointStyle: true },
        },
        scales: {
          x: {
            grid: { display: false },
            border: { display: false },
            ticks: { font: { size: 12 } },
          },
          y: {
            suggestedMin: 60,
            suggestedMax: 180,
            ticks: { stepSize: 20, font: { size: 12 } },
            grid: { color: COLORS.grid },
            border: { display: false },
          },
        },
      },
    });

    return chartInstance;
  }

  TechCare.bloodPressureChart = { render };
})(window.TechCare = window.TechCare || {});
