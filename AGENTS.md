# Lifeboard — Agent Architecture Guidelines

## Core Directives for Development Agents
1. **Submodule Repository Directives**: Lifeboard is a multi-level submoduled repository. Agents MUST navigate directly into the target child submodule repository (e.g. `glorified-todo/gtodo-be-net`, `Finances/finances-app`, `housesheet/housesheet-app`, `storeroom/storeroom-app`) when reading, modifying, building, or testing code.
2. **.NET Project Layout**: .NET backend repositories (e.g. `gtodo-be-net`) hold all required solution projects directly inside the repository root (`gtodo-be-net.Application`, `gtodo-be-net.Tests`).
3. **Automated Commit Rule**: When operating on branch `dev/agy` (or `dev-agy`), agents are permitted to stage and commit changes automatically upon completing verification.

---

## Architectural Overview & Topology
Lifeboard is an umbrella workspace (`Lifeboard`) managing nested submodules and multi-layer domain applications.

### Naming Taxonomy
All projects follow `{projectName}-{layer}-{technology}`:
- **`projectName`**: `lifeboard`, `gtodo`, `finances`, `housesheet`, `storeroom`
- **`layer`**: `fe` (frontend), `be` (backend), `infra` (infrastructure), `multi` (hybrid/legacy)
- **`technology`**: `angular`, `net`, `ts`, `php`, `js`, `docker`

### Technology Stack LTS Policy
- **.NET**: .NET 8.0 LTS / .NET 10.0 LTS (avoid STS releases like .NET 9 in target baselines)
- **Angular**: v18+ LTS
- **PHP**: 8.2+ LTS

---

## Modules Taxonomy & Submodules Map

- **Umbrella Workspace**: `Lifeboard`
  - `lifeboard-multi-php` ([`lifeboard-multi-php`](file:///home/g3/Repos/g3labz/Lifeboard/lifeboard-multi-php)): Legacy PHP Dashboard Monolith (`index.php`, `cabecalho.php`, `footer.php`, `conecta.php`)
  - Target Roadmap: `lifeboard-fe-angular`, `lifeboard-be-net`
- **Application Submodule**: [`glorified-todo`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo)
  - `gtodo-fe-angular` ([`gtodo-app`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-app)): Angular 18+ Standalone SPA
  - `gtodo-be-net` ([`gtodo-be-net`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net)): .NET Web API + Dapper ORM + SQLite (`gtodo-be-net.Application`, `gtodo-be-net.Tests`)
  - `gtodo-be-ts` ([`gtodo-be-ts`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-ts)): TypeScript Domain Core & Hono HTTP API
  - `gtodo-be-angular` ([`gtodo-be-angular`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-angular)): Experimental Angular SSR Backend
- **Application Submodule**: [`Finances`](file:///home/g3/Repos/g3labz/Lifeboard/Finances)
  - `finances-fe-angular` ([`finances-app`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-app)): Angular 18+ Standalone SPA
- **Application Submodule**: [`housesheet`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet)
  - `housesheet-fe-angular` ([`housesheet-app`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-app)): Angular 18+ Standalone SPA
  - `housesheet-multi-js` ([`housesheet-multi-js`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-multi-js)): Legacy Vanilla HTML/JS App
- **Application Submodule**: [`storeroom`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom)
  - `storeroom-fe-angular` ([`storeroom-app`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-app)): Angular 18+ Standalone SPA
  - `storeroom-multi-js` ([`storeroom-multi-js`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-multi-js)): Legacy Vanilla HTML/JS App
