# AI Performance Plan: dList Core

## Scope

Apply toolkit-side performance support for the `dlist` theme on the local `performance` branch.

Rules:
- keep changes scoped to the `dlist-core` plugin
- preserve shortcode, widget, and Elementor output
- avoid Directorist plugin-core edits

## Implemented Phases

### PERF-01: Admin-Only Demo Importer
- Demo importer setup now loads only in admin.
- Frontend requests still load toolkit widgets, Directorist helpers, and Elementor integration.

### PERF-02: Related Post Query Tuning
- Related posts now return early when the current post has no categories.
- Related-post queries use `no_found_rows` because pagination totals are unused.

### PERF-03: Widget Query Tuning
- Latest/popular post widgets use `no_found_rows`.
- Term-cache priming is disabled where widget output does not render terms.

### PERF-04: Elementor Query Tuning
- Elementor blog query uses `no_found_rows`.

### PERF-05: Asset Audit
- Toolkit JS depends on Owl Carousel and Typed behavior but is currently initialized globally.
- Asset narrowing should be handled as a separate JS guard/dependency pass.

## Manual Validation

Use `AI_PERFORMANCE_QA.md` for widget, Elementor, related-post, and admin demo importer checks.
