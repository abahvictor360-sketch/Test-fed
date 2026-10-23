/**
 * Entry point: load patients (live API, or the saved copy if it is unreachable),
 * pick Jessica Taylor and populate the dashboard.
 */
(function (TechCare) {
  'use strict';

  const SELECTED_PATIENT = 'Jessica Taylor';

  async function init() {
    const main = document.getElementById('main');
    main.setAttribute('aria-busy', 'true');

    try {
      const { patients, source } = await TechCare.api.loadPatients();
      const patient = patients.find((p) => p.name === SELECTED_PATIENT);

      if (!patient) {
        throw new Error(`Patient "${SELECTED_PATIENT}" was not found`);
      }

      const history = patient.diagnosis_history || [];
      const latest = history[0];

      TechCare.render.patientList(patients, patient.name);
      TechCare.render.profile(patient);
      TechCare.render.diagnosticList(patient.diagnostic_list || []);
      TechCare.render.labResults(patient.lab_results || []);

      if (latest) {
        TechCare.render.bloodPressureLegend(latest);
        TechCare.render.vitals(latest);
        TechCare.bloodPressureChart.render(document.getElementById('bp-chart'), history);
      }

      if (source === 'snapshot') {
        TechCare.render.notice('Live data is unavailable, so saved patient data is shown.', init);
      } else {
        TechCare.render.clearToast();
      }
    } catch (err) {
      console.error(err);
      TechCare.render.error('Unable to load patient data. Please check your connection and try again.', init);
    } finally {
      main.setAttribute('aria-busy', 'false');
    }
  }

  document.addEventListener('DOMContentLoaded', init);
})(window.TechCare = window.TechCare || {});
