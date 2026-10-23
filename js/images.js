/**
 * Image fallbacks for patient photos.
 *
 * If a photo from the API can't load (offline, blocked host, broken URL), it is
 * swapped for a local preview portrait matching the patient's gender. If that
 * also fails, a neutral placeholder avatar is shown instead.
 */
(function (TechCare) {
  'use strict';

  const FALLBACK_DIR = 'assets/fallback';
  const PORTRAITS_PER_GENDER = 6;
  const PLACEHOLDER = 'assets/avatar-placeholder.svg';

  /** Small deterministic string hash so a patient always gets the same portrait. */
  function hash(text) {
    let value = 0;
    for (const char of String(text)) {
      value = (value * 31 + char.codePointAt(0)) >>> 0;
    }
    return value;
  }

  /** Local preview portrait for a patient, or the neutral placeholder if gender is unknown. */
  function fallbackSrc(name, gender) {
    const key = String(gender || '').toLowerCase();
    if (key !== 'female' && key !== 'male') return PLACEHOLDER;
    return `${FALLBACK_DIR}/${key}-${(hash(name) % PORTRAITS_PER_GENDER) + 1}.jpg`;
  }

  /** Attributes to spread on a patient <img> so attachFallbacks() can recover it. */
  function fallbackAttrs(patient) {
    return `data-fallback="${TechCare.utils.escapeHtml(fallbackSrc(patient.name, patient.gender))}"`;
  }

  /**
   * Wire up error handling for every image with a data-fallback attribute.
   * Call right after rendering; error events fire asynchronously, so none are missed.
   */
  function attachFallbacks(root) {
    root.querySelectorAll('img[data-fallback]').forEach((img) => {
      const queue = [img.dataset.fallback, PLACEHOLDER];
      img.removeAttribute('data-fallback');

      img.addEventListener('error', function onError() {
        const next = queue.shift();
        if (next) {
          img.src = next;
        } else {
          img.removeEventListener('error', onError); // every source failed; stop retrying
        }
      });
    });
  }

  TechCare.images = { fallbackSrc, fallbackAttrs, attachFallbacks };
})(window.TechCare = window.TechCare || {});
