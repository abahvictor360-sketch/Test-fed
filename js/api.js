/**
 * Coalition Technologies Patient Data API client.
 * Docs: https://documenter.getpostman.com/view/11861104/2sA35G42ve
 */
(function (TechCare) {
  'use strict';

  const ENDPOINT = 'https://fedskillstest.coalitiontechnologies.workers.dev';
  const USERNAME = 'coalition';
  const PASSWORD = 'skills-test';

  /** Builds the HTTP Basic auth header value from the credentials above. */
  function authHeader() {
    return `Basic ${btoa(`${USERNAME}:${PASSWORD}`)}`;
  }

  /**
   * GET every patient record.
   * @returns {Promise<Array<object>>}
   */
  async function fetchPatients() {
    const response = await fetch(ENDPOINT, {
      method: 'GET',
      headers: { Authorization: authHeader() },
    });

    if (!response.ok) {
      throw new Error(`Patient API responded with ${response.status} ${response.statusText}`);
    }

    const data = await response.json();
    if (!Array.isArray(data)) {
      throw new Error('Unexpected Patient API response format');
    }
    return data;
  }

  TechCare.api = { fetchPatients };
})(window.TechCare = window.TechCare || {});
