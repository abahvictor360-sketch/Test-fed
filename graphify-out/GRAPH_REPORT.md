# Graph Report - Test-fed  (2026-11-10)

## Corpus Check
- 10 files · ~27,525 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 2 file(s) not represented in the graph (top: (none) 1, .css 1)

## Summary
- 46 nodes · 47 edges · 9 communities (5 shown, 4 thin omitted)
- Extraction: 55% EXTRACTED · 45% INFERRED · 0% AMBIGUOUS · INFERRED: 21 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `22343633`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- render.js
- Tech.Care — Patient Dashboard
- utils.js
- api.js
- images.js
- blood-pressure-chart.js
- CLAUDE.md

## God Nodes (most connected - your core abstractions)
1. `Tech.Care — Patient Dashboard` - 10 edges
2. `fetchPatients()` - 3 edges
3. `loadPatients()` - 3 edges
4. `render()` - 3 edges
5. `showToast()` - 3 edges
6. `levelMarkup()` - 3 edges
7. `authHeader()` - 2 edges
8. `lastMonths()` - 2 edges
9. `dataset()` - 2 edges
10. `fallbackSrc()` - 2 edges

## Surprising Connections (you probably didn't know these)
- `Data sources` --references--> `loadPatients()`  [INFERRED]
  README.md → js/api.js

## Import Cycles
- None detected.

## Communities (9 total, 4 thin omitted)

### Community 0 - "render.js"
Cohesion: 0.22
Nodes (3): error(), notice(), showToast()

### Community 1 - "Tech.Care — Patient Dashboard"
Cohesion: 0.20
Nodes (9): Browser support, Features, Image fallback (preview portraits), Project structure, Quality and global readiness, Quick start, Scope, Tech.Care — Patient Dashboard (+1 more)

### Community 2 - "utils.js"
Cohesion: 0.47
Nodes (3): escapeHtml(), levelIcon(), levelMarkup()

### Community 3 - "api.js"
Cohesion: 0.60
Nodes (4): authHeader(), fetchPatients(), loadPatients(), Data sources

### Community 5 - "blood-pressure-chart.js"
Cohesion: 0.83
Nodes (3): dataset(), lastMonths(), render()

## Knowledge Gaps
- **4 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Tech.Care — Patient Dashboard` connect `Tech.Care — Patient Dashboard` to `api.js`?**
  _High betweenness centrality (0.082) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `loadPatients()` (e.g. with `api.js` and `Data sources`) actually correct?**
  _`loadPatients()` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Why does `Data sources` connect `api.js` to `Tech.Care — Patient Dashboard`?**
  _High betweenness centrality (0.040) - this node is a cross-community bridge._