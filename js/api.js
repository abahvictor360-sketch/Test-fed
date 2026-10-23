/**
 * Coalition Technologies Patient Data API client.
 * Docs: https://documenter.getpostman.com/view/11861104/2sA35G42ve
 */
(function (TechCare) {
  'use strict';

  const ENDPOINT = 'https://fedskillstest.coalitiontechnologies.workers.dev';
  const USERNAME = 'coalition';
  const PASSWORD = 'skills-test';
  const TIMEOUT_MS = 15000;

  /** Builds the HTTP Basic auth header value from the credentials above. */
  function authHeader() {
    return `Basic ${btoa(`${USERNAME}:${PASSWORD}`)}`;
  }

  /**
   * GET every patient record.
   * @returns {Promise<Array<object>>}
   */
  async function fetchPatients() {
    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), TIMEOUT_MS);

    let response;
    try {
      response = await fetch(ENDPOINT, {
        method: 'GET',
        headers: { Authorization: authHeader(), Accept: 'application/json' },
        signal: controller.signal,
      });
    } finally {
      clearTimeout(timer);
    }

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
