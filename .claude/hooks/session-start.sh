#!/bin/bash
# Installs the Graphify CLI + Claude skill so every cloud session has /graphify.
set -euo pipefail

if [ "${CLAUDE_CODE_REMOTE:-}" != "true" ]; then
  exit 0
fi

cd "${CLAUDE_PROJECT_DIR:-.}"
export PATH="$HOME/.local/bin:$PATH"

# CLI (global uv tool), only if missing
if ! command -v graphify >/dev/null 2>&1; then
  if ! command -v uv >/dev/null 2>&1; then
    python3 -m pip install --quiet --user uv
  fi
  uv tool install graphifyy
fi

# Global Claude skill (~/.claude/skills/graphify), only if missing
if [ ! -f "$HOME/.claude/skills/graphify/SKILL.md" ]; then
  graphify install --platform claude >/dev/null
fi

# Make graphify available on PATH for the session
if [ -n "${CLAUDE_ENV_FILE:-}" ]; then
  echo 'export PATH="$HOME/.local/bin:$PATH"' >> "$CLAUDE_ENV_FILE"
fi

# Refresh the code knowledge graph (AST only, no LLM, no API cost)
graphify update . >/dev/null 2>&1 || true
