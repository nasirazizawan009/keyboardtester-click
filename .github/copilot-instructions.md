# Copilot instructions for this repo

## Project map (focus area: DMB System)
- DMB is a standalone PHP/MySQL app under [DMB/](DMB/) with role-based workflow for Daily Morning Briefs.
- Entry lifecycle is tracked in dmb_workflow (see [DMB/database.sql](DMB/database.sql)) and flows: draft → division review → director_approved → submitted_to_ops → ops_*_approved → submitted_to_dg → dg_viewed.
- Ops users are routed to the compile view; see the redirect logic in [DMB/dashboard.php](DMB/dashboard.php).

## Runtime and setup
- No build tooling. Run under Apache/PHP (XAMPP or cPanel). Database setup is required.
- Configure DB credentials in [DMB/config/database.php](DMB/config/database.php), then import [DMB/database.sql](DMB/database.sql).
- Optional: seed demo data with [DMB/setup_test_data.php](DMB/setup_test_data.php) as described in [DMB/README.md](DMB/README.md).

## Key components and data flow
- Auth/session helpers live in [DMB/config/config.php](DMB/config/config.php) (sanitizeInput, requireRole, canViewAllDivisions, flash messages). Use these before adding new pages or actions.
- UI pages are plain PHP with shared layout from [DMB/includes/header.php](DMB/includes/header.php) and [DMB/includes/footer.php](DMB/includes/footer.php).
- Division user workflow:
  - Create entries in [DMB/entry_create_batch.php](DMB/entry_create_batch.php).
  - Submit drafts via [DMB/batch_submit.php](DMB/batch_submit.php).
  - Approvals and edits happen in [DMB/dashboard.php](DMB/dashboard.php) and [DMB/entry_edit.php](DMB/entry_edit.php).
- Ops compilation/approval happens in [DMB/ops/compile_dmb.php](DMB/ops/compile_dmb.php), including AJAX actions for comment, edit, delete, approve, and submit to DG.
- DG executive view and directives are in [DMB/dg_dashboard.php](DMB/dg_dashboard.php) with AJAX for comments and mark viewed.

## APIs and integration points
- Heading suggestions and history: [DMB/api_heading_suggestions.php](DMB/api_heading_suggestions.php) (used by entry creation UI).
- Edit history API: [DMB/api_edit_history.php](DMB/api_edit_history.php).
- Cron automation: [DMB/auto_forward.php](DMB/auto_forward.php) forwards director-approved entries to Ops daily at 15:30 (see script header).

## Conventions to follow
- Prefer prepared statements for inserts/updates (see examples in [DMB/entry_create_batch.php](DMB/entry_create_batch.php)); use mysqli directly for simple reads.
- Always call requireLogin or requireRole at the top of protected pages.
- When mutating entries, insert into dmb_edit_history (see [DMB/entry_edit.php](DMB/entry_edit.php) and Ops edit flow in [DMB/ops/compile_dmb.php](DMB/ops/compile_dmb.php)).
- Workflow status strings are hard-coded across pages; keep them consistent with [DMB/database.sql](DMB/database.sql).

## Styling
- Global styles are in [DMB/assets/css/style.css](DMB/assets/css/style.css). Most pages add inline styles per-view.
