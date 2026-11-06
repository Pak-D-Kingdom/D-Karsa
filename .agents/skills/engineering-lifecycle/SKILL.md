---
name: engineering-lifecycle
description: >-
  Use this skill for full-lifecycle software engineering tasks based on Addy Osmani's
  agent skills, including requirements definition, task breakdown, anti-rationalization checks,
  testing rigor, and safe deployment gates.
---

# Addy Osmani Production Engineering Lifecycle

This skill encodes production-grade engineering workflows and quality gates across the entire software development lifecycle (SDLC), designed to prevent AI coding agents from taking shortcuts.

## The 6 Lifecycle Stages

### 1. Define (Requirements & Context)
* Clarify the objective, user persona, and constraints before proposing architecture.
* Identify existing patterns, dependencies, and configuration in the codebase.
* State explicit non-goals (what we are NOT doing).

### 2. Plan (Decomposition)
* Break down complex features into bite-sized, independently testable tasks.
* Order tasks to minimize risk (e.g., core logic and data models first, UI integrations last).
* Include concrete verification steps for each milestone.

### 3. Build (Incremental Implementation)
* Implement one discrete step at a time.
* Keep changes modular, readable, and typed.
* Handle error states, nullability, and boundary conditions defensively.

### 4. Verify (Testing & Proof)
* Run existing test suites to detect regressions.
* Add unit/integration tests that exercise both the happy path and negative failure modes.
* Verify real output rather than mocking everything away.

### 5. Review (Quality & Security Hardening)
* Check against OWASP basics (input validation, SQLi/XSS prevention, secret exposure).
* Review diffs for unnecessary complexity, dead code, or leftover console logs.
* Verify accessibility, performance, and internationalization where applicable.

### 6. Ship (Delivery Safeguards)
* Ensure documentation, READMEs, or API contracts are up to date.
* Provide clear rollback procedures and verification commands for production deployment.

---

## Anti-Rationalization Table

AI agents frequently construct excuses to bypass engineering discipline. Use this counter-table whenever tempting shortcuts arise:

| Agent Rationalization / Excuse | Counter-Discipline (Reality Check) |
| :--- | :--- |
| *"This change is trivial, so unit tests are not necessary."* | Trivial changes cause silent breakages. Write at least one boundary test to prove the fix. |
| *"I will write the test suite after implementing all features."* | Post-hoc tests are biased and often skipped. Write tests alongside or before implementation. |
| *"I should also refactor this related module while I'm editing this file."* | Scope creep introduces unreviewed bugs. File a separate task; keep the current PR strictly scoped. |
| *"The test failed due to environment issues, but the code logic is correct."* | Never assume test failure is environmental until proven. Inspect the exact stack trace and fix root cause. |
| *"I will use a placeholder or TODO here for the user to complete."* | Finish the implementation completely. Only defer to the user if external credentials or business decisions are required. |
| *"Let's add an abstract generic factory in case we support other databases later."* | Premature abstraction adds maintenance debt. Implement the concrete solution for current requirements. |
