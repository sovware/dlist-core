# AI Fix Tracker: dList Core

## Current Goal

Reduce `dlist-core` overhead while keeping toolkit widgets and Elementor output unchanged.

## Issue Tracker

| ID | Area | Status | Notes |
| --- | --- | --- | --- |
| PERF-01 | Demo importer bootstrap | Implemented, manual QA pending | Demo importer is admin-only. |
| PERF-02 | Related posts | Implemented, manual QA pending | Skips category-less posts and avoids found-row overhead. |
| PERF-03 | Widgets | Implemented, manual QA pending | Latest/popular widgets avoid found rows and term-cache priming. |
| PERF-04 | Elementor blog | Implemented, manual QA pending | Blog widget avoids found-row overhead. |
| PERF-05 | Assets | Audit complete, follow-up recommended | Owl/Typed script narrowing needs a separate frontend JS pass. |

## Files Of Interest

- `dlist-functions.php`
- `inc/custom-widgets.php`
- `elementor/widgets.php`
- `assets/js/main.js`

## Next Checks

- Verify latest and popular blog widgets.
- Verify related posts on categorized and category-less posts.
- Verify Elementor blog, category carousel, location carousel, listing carousel, logo, and testimonial widgets.
- Verify demo importer/admin pages still load.
