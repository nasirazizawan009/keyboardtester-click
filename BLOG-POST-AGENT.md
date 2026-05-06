# KBT Blog Post Consistency Agent

Use this spec whenever a user asks to create, rewrite, expand, refresh, or deploy a KeyboardTester.click blog post. The goal is consistent article structure, media coverage, schema, internal linking, and verification across every post.

## Invocation Rule

Before writing or editing a blog post, call or simulate this specialist agent first:

- Agent name: `kbt-blog-post-consistency`
- Scope: blog article planning, template enforcement, media plan, SEO structure, schema checklist, deployment checklist
- Workspace: `C:\xampp\htdocs\kbt`
- Output required before editing: a compact article blueprint with the parameters below filled in

If the runtime supports subagents, spawn a read-only planning subagent with this file as the prompt source. If subagents are unavailable, apply this checklist directly and state the filled parameters in the working notes.

## Required Parameters

Every blog request must resolve these parameters before content is finalized:

| Parameter | Default | Notes |
|---|---:|---|
| `mode` | `new` | `new`, `update`, `refresh`, or `rewrite` |
| `target_url_or_slug` | required | Existing article URL/path or proposed slug |
| `primary_keyword` | required | Lead title, H1, slug, first paragraph, and meta direction |
| `secondary_keywords` | 5-10 | Pull from GSC, SERP, user wording, or research |
| `audience` | `practical users` | Examples: gamers, power users, laptop users, students, creators |
| `intent` | `how-to + diagnostic` | Match search intent before writing |
| `image_count` | `4` | Minimum 3 for serious posts; 5-6 for pillar posts |
| `image_style` | `relevant stock-style photos` | Product-specific images when reviewing products; diagrams only when they clarify |
| `video_embed` | `optional` | Use only if the video is genuinely relevant and verified live |
| `fast_answer` | `true` | Answer box near the top |
| `jump_links` | `true` | Use when article has 5+ substantial sections |
| `quick_tips` | `true` | Practical tips/checklist callout |
| `info_tabs_or_cards` | `true` | Use cards/tables for quick comparisons, symptoms, specs, or workflows |
| `faq_count` | `5` | Usually 4-7 visible FAQs plus FAQPage schema |
| `source_count` | `3` | Use authoritative/current sources for technical/product claims |
| `related_tools_count` | `4` | Link to relevant on-site tools with descriptive anchors |
| `related_posts_count` | `2` | Link to sibling blog posts where useful |
| `publish_or_update_date` | today | Visible meta and JSON-LD must match |
| `deploy_required` | `true` | Most user blog requests here expect live deployment unless explicitly local-only |

## Standard Article Pattern

Use this content order unless the topic clearly needs a different structure:

1. PHP setup: `config.php`, `blog-article-ads.php`, title/meta/canonical/Open Graph variables.
2. JSON-LD schema: `BlogPosting` or `Article`, `FAQPage`, and `BreadcrumbList`; add `VideoObject` only for a real embedded video.
3. Back link to `/blog/`.
4. Hero image: relevant image, eager loading, width/height, clear alt text.
5. H1: natural, keyword-led, not an exact duplicate of the browser title.
6. Visible post meta: Published and Last updated with machine-readable `<time datetime="YYYY-MM-DD">`.
7. Fast answer box: direct answer in 2-4 sentences.
8. Intro: pain point, who the guide is for, and link to the relevant on-site tool.
9. Jump links: anchor links to the main sections.
10. Main sections: 6-9 H2s for pillar posts, each with practical evidence, tables, cards, or examples.
11. Quick tips or workflow box: short checklist users can act on immediately.
12. Inline figures: each relevant to the nearby section, with caption, width/height, lazy loading, and descriptive alt.
13. Comparison tables/cards: symptoms, specs, causes, fixes, or buying/testing criteria.
14. Source section: authoritative references for technical claims.
15. Related tools/cards: internal links to tools that continue the workflow.
16. Visible FAQ section: match the FAQPage schema questions.
17. Final CTA: one useful action, usually the relevant KeyboardTester.click tool.

## Visual and Media Rules

- Do not use decorative filler images.
- Use fresh, relevant media for new posts whenever feasible.
- For update/refresh posts, reuse existing relevant article images only when they still match the new content; otherwise replace or add stronger assets.
- Prefer WebP at sensible dimensions (`1280px` wide for hero or major inline images).
- Every image needs `alt`, `width`, `height`, `loading`, and `decoding`.
- Hero image uses `loading="eager"` and `fetchpriority="high"`.
- Inline images use `<figure>` and `<figcaption>`.
- Product review posts need product-specific images, not generic stock photos.

## Research Rules

- Browse for current facts when claims may have changed: products, prices, specs, standards, software behavior, official docs, or recent reviews.
- Use primary sources where possible: official vendor docs, standards docs, MDN/Microsoft docs, credible testing labs.
- Do not invent numbers. If a range is an estimate, label it as practical guidance rather than a lab fact.
- Put source links in the article when they materially support claims.

## SEO and Internal Linking Rules

- Slug starts with the primary keyword and remains lowercase with hyphens.
- Meta description should be about 145-160 characters and written for clicks, not keyword stuffing.
- Add/update the post in `blog/posts-data.php`.
- Link from the article to relevant site tools at least twice when natural.
- Add sibling blog links when they help the reader.
- For high-value posts, add contextual links from relevant tool pages back to the blog post when in scope.
- Regenerate `sitemap.xml` after blog registry or article changes.

## Technical Rules

- Blog articles are static PHP files under `blog/`.
- The `blog/` path is gitignored, so article files and images may need direct SFTP deployment even when tracked metadata changes are committed.
- Use `url()` and `absoluteUrl()` helpers for internal URLs.
- Use `includes/seo-meta.php`, `includes/head-common.php`, and `includes/components/blog-article-ads.php`.
- Keep one visible H1.
- Do not use both JSON-LD and microdata for the same schema type.
- Internal links should open in the same tab.
- External links should use `target="_blank" rel="noopener"`.

## Verification Checklist

Before deploy:

- `C:\xampp\php\php.exe -l blog/{slug}.php`
- `C:\xampp\php\php.exe -l blog/posts-data.php` when changed
- Local HTTP 200 on `http://localhost/kbt/blog/{slug}.php`
- Exactly one H1
- Expected schema markers present
- Hero and inline image references present
- No broken local image paths
- Mobile layout has no page-level horizontal overflow when changed substantially

After deploy:

- Deploy with SFTP/paramiko, not FTPS.
- Live article HTTP 200.
- Live article has one H1, expected title/H1/meta/schema/content markers.
- Live image URLs return HTTP 200 and correct content type.
- Live blog index/archive card is updated when `posts-data.php` changed.
- Live `sitemap.xml` includes the URL with the correct `lastmod`.
- Submit IndexNow through `https://keyboardtester.click/submit-indexnow.php?key=kbt-submit-2024`.
- Update `AI-COORDINATION.md` before ending the session.

## Output Blueprint Template

The agent should produce this before editing:

```text
Blog Post Blueprint
mode:
target_url_or_slug:
primary_keyword:
secondary_keywords:
audience:
intent:
title:
h1:
meta_description:
image_count:
media_plan:
fast_answer:
jump_links:
quick_tips:
info_cards_or_tables:
faq_pattern:
related_tools:
related_posts:
sources_to_verify:
files_expected:
deploy_plan:
verification_plan:
```
