"""Apply blog cross-link matrix: insert tool links into each blog post's
'Related Tools' section. Idempotent — skips entries already present."""
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
matrix = json.loads((ROOT / 'scripts' / 'blog-cross-link-matrix.json').read_text(encoding='utf-8'))


def insert_links(blog_path: Path, items: list) -> tuple[int, int, list]:
    """Returns (added_count, skipped_count, log)."""
    text = blog_path.read_text(encoding='utf-8')
    log = []
    added = skipped = 0

    # Find a "Related Tools" / "Related Audio Tools" / "Related Guides" section
    # that already exists. Insert before its closing </ul>.
    related_section_re = re.compile(
        r'(<h2>Related (?:Tools|Audio Tools|Guides|Diagnostics)[^<]*</h2>\s*<ul>)(.*?)(</ul>)',
        re.S | re.I)
    m = related_section_re.search(text)
    if not m:
        log.append(f'  no Related section found — skipping all {len(items)} suggestions')
        return 0, len(items), log

    head, body, tail = m.group(1), m.group(2), m.group(3)
    new_body = body
    for item in items:
        tool, anchor, context = item['tool'], item['anchor'], item['context']
        # Skip if already linked (idempotent)
        if f'/{tool}.php' in body:
            skipped += 1
            log.append(f'  skip {tool}: already linked')
            continue
        new_li = (f'\n<li><a href="https://keyboardtester.click/{tool}.php" '
                  f'target="_blank" rel="noopener">{anchor}</a> '
                  f'&#8212; {context}</li>')
        new_body = new_body.rstrip() + new_li + '\n'
        added += 1
        log.append(f'  add  {tool}')
    new_text = text[:m.start()] + head + new_body + tail + text[m.end():]
    blog_path.write_text(new_text, encoding='utf-8')
    return added, skipped, log


def main():
    total_added = total_skipped = 0
    blogs_modified = []
    for slug, items in matrix.items():
        blog_path = ROOT / 'blog' / slug
        if not blog_path.exists():
            print(f'MISSING: {slug}')
            continue
        print(f'\n--- {slug} ({len(items)} suggested) ---')
        a, s, log = insert_links(blog_path, items)
        for line in log:
            print(line)
        total_added += a; total_skipped += s
        if a > 0:
            blogs_modified.append(slug)
    print(f'\nDone. {total_added} links added, {total_skipped} skipped (already present).')
    print(f'Modified {len(blogs_modified)} blog posts.')
    print('Modified files:')
    for s in blogs_modified:
        print(f'  blog/{s}')


if __name__ == '__main__':
    main()
