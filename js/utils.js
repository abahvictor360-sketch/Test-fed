/**
 * Small, dependency-free helpers shared by the rendering code.
 */
(function (TechCare) {
  'use strict';

  const HTML_ESCAPES = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' };

  /** Escape API-provided text before it is interpolated into HTML. */
  function escapeHtml(value) {
    return String(value ?? '').replace(/[&<>"']/g, (char) => HTML_ESCAPES[char]);
  }

  /** Page locale (from <html lang>), used for all date formatting. */
  const LOCALE = document.documentElement.lang || 'en';

  /**
   * "08/23/1996" (the API's MM/DD/YYYY format) -> "August 23, 1996" in the page locale.
   * Falls back to the raw value if it can't be parsed.
   */
  function formatDate(value) {
    const match = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/.exec(value || '');
    if (!match) return value || '';

    const [, month, day, year] = match.map(Number);
    return new Date(year, month - 1, day).toLocaleDateString(LOCALE, {
      month: 'long',
      day: 'numeric',
      year: 'numeric',
    });
  }

  /** "March" -> "Mar" */
  function shortMonth(month) {
    return String(month || '').slice(0, 3);
  }

  /** Maps an API level string ("Higher than Average", ...) to the arrow icon id, if any. */
  function levelIcon(level) {
    const text = String(level || '').toLowerCase();
    if (text.startsWith('higher')) return 'icon-arrow-up';
    if (text.startsWith('lower')) return 'icon-arrow-down';
    return null;
  }

  function levelMarkup(level) {
    const icon = levelIcon(level);
    const arrow = icon ? `<svg class="icon" aria-hidden="true"><use href="#${icon}"/></svg>` : '';
    return `<p class="level">${arrow}<span>${escapeHtml(level)}</span></p>`;
  }

  TechCare.utils = { escapeHtml, formatDate, shortMonth, levelMarkup };
})(window.TechCare = window.TechCare || {});
