---
name: impeccable-design
description: >-
  Use this skill when creating or refining frontend UI/UX, catching AI slop,
  establishing design systems, polishing typography and visual rhythm, and
  ensuring accessibility, responsive layouts, and edge-case resilience.
---

# Impeccable Frontend Craftsmanship

This skill provides design intelligence and quality gates based on Paul Bakaus's Impeccable framework to ensure user interfaces look intentional, human-crafted, and free of generic "AI slop".

## 1. Anti-AI-Slop Rules

Generic AI design usually suffers from predictable failure patterns. Avoid these strictly:

* **No Centered Monotony**: Avoid centering every hero header, paragraph, button, and card. Use left-aligned, readable content blocks with intentional asymmetric layouts.
* **No Purposeless Gradients**: Replace arbitrary generic purple/blue gradients with cohesive, functional color palettes grounded in brand identity.
* **No Card-in-Card Nesting**: Avoid stacking unnecessary border boxes, containers, and card wrappers. Use whitespace, divider rules, and typographic scale to separate sections.
* **No Generic Floating Shadows**: Avoid heavy, muddy `box-shadow` values (`box-shadow: 0 10px 30px rgba(0,0,0,0.3)`). Use subtle layered ambient shadows or clean borders.

---

## 2. Craftsmanship Checklist

### Typography & Hierarchy
* **Scale**: Limit typography to 3–4 distinct size steps (Display/Title, Subtitle/H2, Body, Caption).
* **Line Length**: Keep prose line lengths between 45 and 75 characters (`max-w-prose` or `max-width: 65ch`) for optimal readability.
* **Leading & Tracking**: Tighter line height for large headings (`leading-tight`), relaxed line height for body paragraphs (`leading-relaxed`).

### Spacing & Visual Rhythm
* **4px / 8px Grid**: Maintain consistent spacing multiples (`4px`, `8px`, `16px`, `24px`, `32px`, `48px`, `64px`).
* **Section Breathing Room**: Give primary sections ample vertical padding. Don't crowd UI components into the top-left corner.

### State & Edge-Case Resilience
Every UI component must account for the 5 fundamental states:
1. **Empty State**: Friendly illustration/message and a clear primary call-to-action when data is empty.
2. **Loading State**: Subtle skeleton loaders or spinner states with disabled buttons to prevent double-submits.
3. **Error State**: Informative, actionable error messages with retry buttons.
4. **Extreme Data / Overflow**: Test for long internationalized strings, line-clamping, and text truncation (`truncate` or `line-clamp-2`).
5. **Responsive Scaling**: Mobile (<640px), Tablet (640-1024px), and Desktop (>1024px) adaptability.

### Accessibility (a11y)
* Ensure contrast ratio meets WCAG AA (minimum 4.5:1 for body text).
* Include visible `:focus-visible` outlines for keyboard navigation.
* Use semantic HTML elements (`<main>`, `<nav>`, `<article>`, `<button>`, `<dialog>`) instead of nested `<div>` clickable spans.
