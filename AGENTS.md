# Lifeboard — Agent Architecture Guidelines

## Core Directives for Development Agents
1. **Submodule Repository Directives**: Lifeboard is a multi-level submoduled repository. Agents MUST navigate directly into the target child submodule repository (e.g. `glorified-todo/gtodo-be-net`, `Finances/finances-fe-angular`, `housesheet/housesheet-fe-angular`, `storeroom/storeroom-fe-angular`) when reading, modifying, building, or testing code.
2. **.NET Project Layout**: .NET backend repositories (e.g. `gtodo-be-net`) hold all required solution projects directly inside the repository root (`gtodo-be-net.Application`, `gtodo-be-net.Tests`).
3. **Automated Commit & Push Policy (`dev-agy`)**:
   - When operating on branch `dev-agy` (or `dev/agy`), agents are authorized and required to commit and push changes.
   - Commit after every iteration.
   - Bump the project version upon each iteration. For projects containing a `package.json`, increment the patch version following `X.Y.Z` semantics (e.g., `npm version patch` or updating the `z` value).
4. **Testing & Verification Directives**:
   - Tests are mandatory to ensure code correctness.
   - **Backend Applications (.NET, Node, Go)**: Strictly follow Test-Driven Development (TDD) — write test cases before implementation and verify.
   - **Frontend Applications**: Create and execute corresponding tests after each iteration.

---

## Architectural Overview & Topology
Lifeboard is an umbrella workspace (`Lifeboard`) managing nested submodules and multi-layer domain applications.

### Naming Taxonomy
All projects follow `{projectName}-{layer}-{technology}` and legacy projects follow `{projectName}-legacy`:
- **`projectName`**: `lifeboard`, `gtodo`, `finances`, `housesheet`, `storeroom`
- **`layer`**: `fe` (frontend), `be` (backend), `infra` (infrastructure), `legacy` (legacy monolith/web)
- **`technology`**: `angular`, `net`, `ts`, `php`, `js`, `docker`

### Technology Stack Policy
- **.NET**: **.NET 10.0 LTS** baseline
- **Angular**: **v22** (with TypeScript 7)
- **TypeScript**: **TS 7.x**
- **PHP**: 8.2+ LTS

---

## Modules Taxonomy & Submodules Map

- **Umbrella Workspace**: `Lifeboard`
  - `lifeboard-legacy` ([`lifeboard-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/lifeboard-legacy)): Legacy PHP Dashboard Monolith (`index.php`, `cabecalho.php`, `footer.php`, `conecta.php`)
  - Target Roadmap: `lifeboard-fe-angular`, `lifeboard-be-net`
- **Application Submodule**: [`glorified-todo`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo)
  - `gtodo-fe-angular` ([`gtodo-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-fe-angular)): Angular v22 Standalone SPA
  - `gtodo-be-net` ([`gtodo-be-net`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net)): .NET 10 Web API + Dapper ORM + SQLite (`gtodo-be-net.Application`, `gtodo-be-net.Tests`)
- **Application Submodule**: [`Finances`](file:///home/g3/Repos/g3labz/Lifeboard/Finances)
  - `finances-fe-angular` ([`finances-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-fe-angular)): Angular v22 Standalone SPA
  - `finances-legacy` ([`finances-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-legacy)): Legacy Web Application
- **Application Submodule**: [`housesheet`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet)
  - `housesheet-fe-angular` ([`housesheet-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-fe-angular)): Angular v22 Standalone SPA
  - `housesheet-legacy` ([`housesheet-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-legacy)): Legacy Vanilla HTML/JS App
- **Application Submodule**: [`storeroom`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom)
  - `storeroom-fe-angular` ([`storeroom-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-fe-angular)): Angular v22 Standalone SPA
  - `storeroom-legacy` ([`storeroom-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-legacy)): Legacy Vanilla HTML/JS App
