# Tech.Care — Patient Dashboard

A responsive single-page dashboard built from the Coalition Technologies Adobe XD template.
It shows **Jessica Taylor's** data, loaded from the Coalition Technologies Patient Data API.

## Running

Open `index.html` in a browser. There's no build step. You need an internet connection
because the page loads the API, Chart.js (cdnjs) and the Manrope font (Google Fonts).

Or serve the folder: `npx http-server .`

## Structure

```
index.html                    Markup + inline SVG icon sprite
css/styles.css                Design tokens, layout, components, responsive breakpoints
js/utils.js                   HTML escaping, date/level formatting helpers
js/api.js                     GET request to the Patient Data API (HTTP Basic auth via btoa)
js/blood-pressure-chart.js    Chart.js line chart of the last 6 months of blood pressure
js/render.js                  Renders each dashboard section from API data
js/app.js                     Entry point: fetch → pick Jessica Taylor → render
assets/                       Logo, favicon and doctor avatar (SVG)
```

## Notes

- All patient content (patient list, profile, vitals, blood pressure chart, diagnostic list, lab results)
  comes from the API. Nothing is hard-coded.
- API text is HTML-escaped before it goes into the DOM.
- Interactions not in the template (search, settings menu, ellipsis menus, the "Last 6 months" dropdown)
  are deliberately left static.
- Breakpoints: three columns ≥1201px, two columns ≤1200px, one column ≤900px, phone tweaks ≤640px.
