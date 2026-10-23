/**
 * DOM rendering for each dashboard section. Every function receives API data
 * and writes into the matching [data-slot] element.
 */
(function (TechCare) {
  'use strict';

  const { escapeHtml, formatDate, levelMarkup } = TechCare.utils;
  const { fallbackAttrs, attachFallbacks } = TechCare.images;

  const slot = (name) => document.querySelector(`[data-slot="${name}"]`);

  function patientList(patients, activeName) {
    slot('patient-list').innerHTML = patients.map((patient) => {
      const isActive = patient.name === activeName;
      return `
        <li class="patient${isActive ? ' is-active' : ''}"${isActive ? ' aria-current="true"' : ''}>
          <img class="patient__avatar" src="${escapeHtml(patient.profile_picture)}" ${fallbackAttrs(patient)} alt="" width="48" height="48" loading="lazy">
          <div class="patient__info">
            <p class="patient__name">${escapeHtml(patient.name)}</p>
            <p class="patient__meta">${escapeHtml(patient.gender)}, ${escapeHtml(patient.age)}</p>
          </div>
          <button class="icon-btn" type="button" aria-label="More options for ${escapeHtml(patient.name)}">
            <svg class="icon" aria-hidden="true"><use href="#icon-more-horizontal"/></svg>
          </button>
        </li>`;
    }).join('');

    attachFallbacks(slot('patient-list'));
  }

  function bloodPressureLegend(latest) {
    const { systolic, diastolic } = latest.blood_pressure;
    const stat = (modifier, label, reading) => `
      <div class="bp-stat bp-stat--${modifier}">
        <dt class="bp-stat__label">${label}</dt>
        <dd>
          <p class="bp-stat__value">${escapeHtml(reading.value)}</p>
          ${levelMarkup(reading.levels)}
        </dd>
      </div>`;

    slot('bp-legend').innerHTML =
      stat('systolic', 'Systolic', systolic) + stat('diastolic', 'Diastolic', diastolic);
  }

  function vitals(latest) {
    const items = [
      { modifier: 'respiratory', icon: 'icon-lungs', label: 'Respiratory Rate', unit: 'bpm', reading: latest.respiratory_rate },
      { modifier: 'temperature', icon: 'icon-thermometer', label: 'Temperature', unit: '°F', reading: latest.temperature },
      { modifier: 'heart', icon: 'icon-heart', label: 'Heart Rate', unit: 'bpm', reading: latest.heart_rate },
    ];

    slot('vitals').innerHTML = items.map(({ modifier, icon, label, unit, reading }) => `
      <li class="vital vital--${modifier}">
        <span class="vital__icon"><svg aria-hidden="true"><use href="#${icon}"/></svg></span>
        <p class="vital__label">${label}</p>
        <p class="vital__value">${escapeHtml(reading.value)}${unit === '°F' ? unit : ` ${unit}`}</p>
        ${levelMarkup(reading.levels)}
      </li>`).join('');
  }

  function diagnosticList(diagnostics) {
    slot('diagnostic-list').innerHTML = diagnostics.length
      ? diagnostics.map((item) => `
          <tr>
            <td>${escapeHtml(item.name)}</td>
            <td>${escapeHtml(item.description)}</td>
            <td>${escapeHtml(item.status)}</td>
          </tr>`).join('')
      : '<tr><td colspan="3" class="empty">No diagnoses recorded.</td></tr>';
  }

  function profile(patient) {
    const isFemale = String(patient.gender).toLowerCase() === 'female';
    const rows = [
      { icon: 'icon-calendar', label: 'Date Of Birth', value: formatDate(patient.date_of_birth) },
      { icon: isFemale ? 'icon-female' : 'icon-male', label: 'Gender', value: patient.gender },
      { icon: 'icon-phone', label: 'Contact Info.', value: patient.phone_number },
      { icon: 'icon-phone', label: 'Emergency Contacts', value: patient.emergency_contact },
      { icon: 'icon-shield', label: 'Insurance Provider', value: patient.insurance_type },
    ];

    slot('profile').innerHTML = `
      <img class="profile__photo" src="${escapeHtml(patient.profile_picture)}" ${fallbackAttrs(patient)} alt="Photo of ${escapeHtml(patient.name)}" width="200" height="200">
      <h2 class="profile__name">${escapeHtml(patient.name)}</h2>
      <dl class="profile__details">
        ${rows.map(({ icon, label, value }) => `
          <div class="profile__row">
            <span class="profile__icon"><svg class="icon" aria-hidden="true"><use href="#${icon}"/></svg></span>
            <div>
              <dt class="profile__label">${label}</dt>
              <dd class="profile__value">${escapeHtml(value)}</dd>
            </div>
          </div>`).join('')}
      </dl>
      <button class="btn" type="button">Show All Information</button>`;

    attachFallbacks(slot('profile'));
  }

  function labResults(results) {
    slot('lab-results').innerHTML = results.length
      ? results.map((result) => `
          <li class="lab">
            <span>${escapeHtml(result)}</span>
            <button class="icon-btn" type="button" aria-label="Download ${escapeHtml(result)}">
              <svg class="icon" aria-hidden="true"><use href="#icon-download"/></svg>
            </button>
          </li>`).join('')
      : '<li class="empty">No lab results available.</li>';
  }

  /** Shows an error message with a retry action. */
  function error(message, onRetry) {
    const toast = slot('error');
    toast.innerHTML = `<span>${escapeHtml(message)}</span>`;

    if (onRetry) {
      const retry = document.createElement('button');
      retry.type = 'button';
      retry.className = 'toast__action';
      retry.textContent = 'Retry';
      retry.addEventListener('click', () => {
        toast.hidden = true;
        onRetry();
      });
      toast.append(retry);
    }

    toast.hidden = false;
  }

  TechCare.render = {
    patientList,
    bloodPressureLegend,
    vitals,
    diagnosticList,
    profile,
    labResults,
    error,
  };
})(window.TechCare = window.TechCare || {});
