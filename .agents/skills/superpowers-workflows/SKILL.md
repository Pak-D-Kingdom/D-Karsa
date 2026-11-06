---
name: superpowers-workflows
description: >-
  Use this skill when executing complex software development tasks following Jesse Vincent's
  Superpowers methodology, including systematic debugging, test-driven development (TDD),
  structured planning, and code review.
---

# Superpowers Engineering Workflows

This skill provides a disciplined, step-by-step workflow for complex coding tasks based on Jesse Vincent's Superpowers methodology.

## 1. Systematic Debugging Workflow

Never guess or apply shotgun fixes. Follow the 4-phase debugging process:

```
[1. Reproduce] -> [2. Isolate & Trace] -> [3. Minimal Fix] -> [4. Verify & Protect]
```

1. **Phase 1: Reproduce Deterministically**
   * Write an automated test case or minimal script that triggers the exact failure.
   * If an automated test is impossible, document exact reproduction steps and expected vs actual outcomes.
2. **Phase 2: Isolate Root Cause**
   * Form explicit hypotheses based on stack traces and code inspection.
   * Use targeted print/logging or debuggers to confirm the exact line and state where invariants break.
   * Do not write the fix until the root cause is proven.
3. **Phase 3: Apply the Minimal Fix**
   * Address the underlying causal mechanism, not just the symptom.
   * Keep the fix localized and minimal.
4. **Phase 4: Verify & Protect**
   * Run the reproduction test created in Phase 1 to confirm it now passes.
   * Run the full regression test suite to ensure no side effects.

---

## 2. Test-Driven Development (TDD) Workflow

When creating new features or fixing defects:

1. **Write the Failing Test (Red)**:
   * Write a unit test asserting the desired behavior or API contract.
   * Run the test and confirm it fails for the expected reason (not a syntax error).
2. **Write the Minimal Implementation (Green)**:
   * Write just enough code to make the test pass.
   * Avoid gold-plating or speculative features.
3. **Refactor & Clean (Refactor)**:
   * Clean up formatting, variable naming, and remove duplication.
   * Ensure tests remain green throughout refactoring.

---

## 3. Structured Execution Planning

For tasks involving multiple files or components:

1. Create a written implementation plan with clear sub-milestones.
2. Under each milestone, list:
   - Target files and functions.
   - Validation command or test to run.
   - Rollback strategy if unexpected errors occur.
3. Check off milestones sequentially; do not jump ahead.
