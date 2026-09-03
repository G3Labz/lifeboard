# Lifeboard Ecosystem — Roadmap & Feature Control

## 1. System Metadata & Topology

| Attribute | Specification |
| :--- | :--- |
| **Workspace Name** | `Lifeboard` (Umbrella Root) |
| **Current Version** | `v0.2.0` |
| **Architecture Type** | Multi-submodule monorepo & cross-application orchestrator |
| **Baseline Target** | .NET 10.0 LTS / Angular v22 / PHP 8.2+ LTS |
| **Active Submodules** | `Finances`, `glorified-todo`, `housesheet`, `storeroom`, `lifeboard-legacy` |
| **Future Projects** | `lifeboard-fe-angular` (Shell SPA), `lifeboard-be-net` (Gateway API) |

---

## 2. Vision & Architectural Scope

`Lifeboard` is an umbrella ecosystem designed to integrate personal life management into a single, cohesive developer workspace. Rather than relying on disparate SaaS tools or isolated spreadsheets, Lifeboard centralizes:
- **Financial Planning & Reconciliation** (`Finances`)
- **Thermal Task Management & Eisenhower Prioritization** (`glorified-todo`)
- **Household Chores & Appliance Lifecycle Tracking** (`housesheet`)
- **Pantry Inventory, Fiscal Note Ingestion & Shopping Lists** (`storeroom`)

The umbrella repository coordinates submodule topologies, shared container environments (`compose.yaml`), cross-cutting CI/CD standards, and the transition from the legacy PHP dashboard (`lifeboard-legacy`) to a modern micro-frontend shell (`lifeboard-fe-angular`) backed by a unified API Gateway (`lifeboard-be-net`).

---

## 3. Feature Capabilities & Control Matrix

This matrix governs global features and orchestrations across the entire Lifeboard ecosystem.

| Feature Identifier | Feature Key | Status | Version Introduced | Target Version | Description |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Multi-Submodule Topology** | `FEATURE_ECOSYSTEM_SUBMODULES` | Released | `v0.1.0` | `v0.1.0` | Multi-level Git submodules coordinating all application repositories. |
| **LTS Stack Standardization** | `FEATURE_ECOSYSTEM_LTS_BASELINE` | Released | `v0.2.0` | `v0.2.0` | Unified baseline on .NET 10.0 LTS, Angular v22, TypeScript 7.x, PHP 8.2+. |
| **Docker Compose Dev Envs** | `FEATURE_ECOSYSTEM_DOCKER_DEV` | Released | `v0.2.0` | `v0.2.0` | Standardized `compose.yaml` templates across all submodules for quick boot. |
| **Root Shell Navigation Bridge** | `FEATURE_SHELL_IFRAME_BRIDGE` | Released | `v0.2.0` | `v0.2.0` | Embedded navigation from `lifeboard-legacy` to child SPA applications. |
| **Unified Shell SPA** | `FEATURE_SHELL_ANGULAR_SPA` | Planned | — | `v0.3.0` | Angular v22 shell SPA (`lifeboard-fe-angular`) replacing PHP dashboard. |
| **Gateway & Service Proxy** | `FEATURE_GATEWAY_BE_NET` | Planned | — | `v0.4.0` | .NET 10 Web API gateway routing domain requests and providing unified CORS/Reverse Proxy. |
| **Unified Identity & Session** | `FEATURE_UNIFIED_AUTH` | Backlog | — | `v1.0.0` | Single-sign-on (SSO) session sharing across all domain SPAs. |
| **Design System Token Sync** | `FEATURE_DESIGN_TOKENS` | Planned | — | `v0.3.0` | Shared CSS variables and typography tokens across all domain frontends. |
| **Centralized Health Dashboard** | `FEATURE_ECOSYSTEM_HEALTH` | Backlog | — | `v1.0.0` | System status, database health checks, and service discovery dashboard. |

*Status Legend*: `Released` (In production / master), `In Progress` (Actively being developed), `Planned` (Scheduled for next milestones), `Backlog` (Future vision), `Deprecated` (Marked for removal).

---

## 4. Versioning & Release Milestones

### Current Version: `v0.2.0` (Ecosystem Multi-Repo & LTS Alignment)
- [x] Standardized `{projectName}-{layer}-{technology}` taxonomy across all applications and repositories.
- [x] Provisioned `compose.yaml` and `compose.example.yaml` across all parent and child submodules.
- [x] Upgraded Angular frontends to Angular v22 and TypeScript 7.
- [x] Upgraded .NET backend to .NET 10.0 LTS.
- [x] Established `dev-agy` automated agent integration branch.

### Next Milestone: `v0.3.0` — Shell Prototype & Shared UI Tokens
- **Target Timeline**: Q4 2026
- **Primary Goals**:
  - [ ] Initialize `lifeboard-fe-angular` shell project in umbrella structure.
  - [ ] Implement global navigation header supporting tabs for all 4 domain SPAs.
  - [ ] Create shared design token stylesheet (`tokens.css`) defining consistent color palettes, typography (Google Fonts Outfit/Inter), and dark-mode standards.
  - [ ] Provide unified root `docker-compose.yml` that boots all 4 frontend SPAs and backend APIs concurrently.

### Future Milestone: `v0.4.0` — Core Gateway Architecture
- **Target Timeline**: Q1 2027
- **Primary Goals**:
  - [ ] Initialize `lifeboard-be-net` gateway project.
  - [ ] Implement reverse proxy routing:
    - `/api/todo/*` $\rightarrow$ `gtodo-be-net:5050`
    - `/api/finances/*` $\rightarrow$ `finances-be-net:5060` (Future)
    - `/api/storeroom/*` $\rightarrow$ `storeroom-be-net:5070` (Future)
    - `/api/housesheet/*` $\rightarrow$ `housesheet-be-net:5080` (Future)
  - [ ] Aggregate health check endpoint (`/health`) reporting status of all downstream APIs.

### Major Milestone: `v1.0.0` — Unified Personal Operating System
- **Target Timeline**: 2027
- **Primary Goals**:
  - [ ] Deprecate and archive `lifeboard-legacy`.
  - [ ] Production-ready shell SPA hosting domain applications as micro-frontends or seamless tabs.
  - [ ] Single-sign-on or unified local profile switching.
  - [ ] Cross-domain integrations (e.g. todo items auto-generated from pantry restocking or apartment maintenance).

---

## 5. Empirical Changelog

- **2026-08-05 (`v0.1.0`)**: Initial Angular frontends created (`finances-app`, `storeroom-app`, `housesheet-app`) and .NET Web API created (`gtodo-be-net`).
- **2026-08-09 (`v0.1.1`)**: Angular Standalone `gtodo-app` initialized with thermal priority scoring and Kanban board.
- **2026-08-12 (`v0.2.0`)**: Multi-repo submodule taxonomy standardization. Isolated legacy PHP monolith to `lifeboard-legacy`, created Git submodules on GitHub `@G3Labz`, bumped Angular to v22 and .NET to 10.0 LTS.

---

## 6. Feature Control Strategy

Ecosystem-level feature control operates via:
1. **Submodule Pinning**: Git submodule SHA references determine which version of each domain application is loaded into the umbrella workspace.
2. **Environment Profiles (`compose.yaml`)**:
   - `profile: legacy`: Starts `lifeboard-legacy` PHP dashboard and legacy web apps.
   - `profile: modern`: Starts Angular SPAs and .NET Web APIs.
   - `profile: all`: Concurrent development container setup.
