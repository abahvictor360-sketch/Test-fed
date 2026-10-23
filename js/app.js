/**
 * Entry point: fetch patients, pick Jessica Taylor and populate the dashboard.
 */
(function (TechCare) {
  'use strict';

  const SELECTED_PATIENT = 'Jessica Taylor';

  async function init() {
    const main = document.getElementById('main');

    try {
      const patients = await TechCare.api.fetchPatients();
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
    } catch (err) {
      console.error(err);
      TechCare.render.error('Unable to load patient data. Please try again later.');
    } finally {
      main.setAttribute('aria-busy', 'false');
    }
  }

  document.addEventListener('DOMContentLoaded', init);
})(window.TechCare = window.TechCare || {});
