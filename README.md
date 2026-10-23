# Tech.Care — Patient Dashboard

A responsive, single-page patient dashboard built from the Coalition Technologies Adobe XD template.
It shows **Jessica Taylor's** health record, loaded live from the
[Coalition Technologies Patient Data API](https://documenter.getpostman.com/view/11861104/2sA35G42ve).

Built with plain HTML, CSS and JavaScript. No framework and no build step. The blood pressure chart uses
[Chart.js](https://www.chartjs.org/).

---

## Quick start

1. Unzip the project.
2. Open `index.html` in any modern browser.

That's all. To serve it over HTTP instead (optional):

```bash
npx http-server .     # then open http://localhost:8080
```

You need an internet connection to load the API data, Chart.js (cdnjs) and the Manrope font
(Google Fonts). If the font can't load, the page falls back to the system font.

---

## Features

| Section | Data shown | Source |
| --- | --- | --- |
| Patients list | Name, gender, age and photo for every patient; Jessica Taylor highlighted | API |
| Diagnosis History | Line chart of systolic/diastolic blood pressure for the last 6 months | API `diagnosis_history` |
| Blood pressure summary | Latest systolic and diastolic values with level indicators (↑ higher / ↓ lower than average) | API |
| Vitals | Respiratory rate, temperature and heart rate, with levels | API |
| Diagnostic List | Problem/diagnosis, description and status | API `diagnostic_list` |
| Profile | Photo, date of birth, gender, contact, emergency contact, insurance | API |
| Lab Results | List of lab reports | API `lab_results` |

None of the patient data is hard-coded.

---

## Image fallback (preview portraits)

Patient photos come from the URLs the API returns (`profile_picture`). If a photo **can't load**
(offline, a blocked host, a broken URL), the page swaps in a local preview portrait automatically:

1. **API photo:** the `profile_picture` URL from the API.
2. **Preview portrait:** a local image in `assets/fallback/` that matches the patient's gender
   (`female-1.jpg` … `female-6.jpg`, `male-1.jpg` … `male-6.jpg`). The same patient always gets the
   same portrait, so the patients list and the profile card match.
3. **Neutral placeholder:** `assets/avatar-placeholder.svg`, used if the gender is unknown or the
   preview portrait also fails.

The logic is in `js/images.js`. To change the preview portraits, replace the files in `assets/fallback/`,
keeping the same file names. They are 256 × 256 px JPEGs.

---

## Project structure

```
index.html                    Page markup and inline SVG icon sprite
css/styles.css                Design tokens, layout, components, responsive breakpoints
js/utils.js                   HTML escaping, locale-aware date formatting, level indicators
js/images.js                  Patient photo fallbacks (preview portraits → placeholder)
js/api.js                     GET request to the Patient Data API (Basic auth, 15 s timeout)
js/blood-pressure-chart.js    Chart.js line chart of the last 6 months of blood pressure
js/render.js                  Renders each dashboard section from API data
js/app.js                     Entry point: fetch → select Jessica Taylor → render
assets/                       Logo, favicon, doctor avatar, placeholder avatar
assets/fallback/              Gender-matched preview portraits used when API photos fail
```

The scripts are plain files that share one namespace (`window.TechCare`) instead of ES modules, so the
page also works when `index.html` is opened directly from disk (`file://`).

---

## Quality and global readiness

**Accessibility**
- Semantic landmarks (`header`, `nav`, `main`, `aside`, `article`), a heading hierarchy and a skip link.
- Icon-only buttons have `aria-label`s; decorative icons are hidden from screen readers.
- The chart has a text description (`role="img"` + `aria-label`).
- Visible keyboard focus styles, and `aria-busy` while data is loading.
- Errors are announced with `role="alert"`.
- Animations are turned off for users who prefer reduced motion.

**Resilience**
- Shimmer placeholders while the patients list loads.
- If the API request fails or takes longer than 15 seconds, a message appears with a **Retry** button.
- Photo fallbacks as described above.
- A `<noscript>` message for browsers with JavaScript disabled.

**Internationalisation**
- Dates are formatted with the browser's `Intl` API using the page language (`<html lang>`).
  Changing `lang` (for example to `en-GB`) re-formats every date without code changes.
- UTF-8 throughout, with a system-font fallback stack for any script.
- Units are shown as the API supplies them (°F, bpm).

**Security**
- All API text is HTML-escaped before it is inserted into the page.
- No inline event handlers. External scripts load only from cdnjs.

**Responsive layout**

| Viewport width | Layout |
| --- | --- |
| > 1200px | Three columns: patients · diagnosis history · profile and labs |
| 901–1200px | Two columns; profile and lab results move under the chart; nav shows icons only |
| 641–900px | One column: profile → diagnosis → patients |
| ≤ 640px | Phone layout: compact header, scrollable nav, stacked vitals |

No horizontal scrolling at any width.

---

## Scope

As the brief asks, only the elements shown in the template are built. These are deliberately static:
search, the settings (gear) menu, the "…" menus, the "Last 6 months" dropdown, the
"Show All Information" button and the lab result download buttons.

---

## Browser support

Latest two versions of Chrome, Edge, Firefox and Safari, on desktop and mobile.

## Third-party resources

- [Chart.js 4.4.1](https://www.chartjs.org/) (MIT licence), loaded from cdnjs.
- [Manrope](https://fonts.google.com/specimen/Manrope) (SIL Open Font Licence), loaded from Google Fonts.

All application code, styles, icons, the logo and the avatar illustrations were written for this
project.
