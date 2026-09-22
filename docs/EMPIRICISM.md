# Empiricism Log

## [2026-08-05] Angular Frontend Migration & .NET 9 Web API Backend Creation

### 1. `Finances` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`finances-app`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-app).
- **Features**: State management using Angular Signals (`signal`, `computed`), currency pipe formatting (`BRL`), dynamic greeting, emoji feedback (`🚀` / `👎`), and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 2. `storeroom` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`storeroom-app`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-app).
- **Features**: Dual inventory (`Have`) and shopping list (`Buy`) tracking, `markAsBought()` migration, item deletion, clear-all, and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 3. `housesheet` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`housesheet-app`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-app).
- **Features**: Household activity logging with category badges, status toggling (`Pending ⏳` / `Completed ✅`), entry deletion, log clearing, and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 4. `glorified-todo` (.NET 9 Web API Backend & Dapper ORM)
- **Architecture**: Created .NET 9 Web API project [`gtodo-be-net`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net).
- **ORM & DI Implementation**:
  - Integrated `Dapper` (`v2.1.35`) and `Microsoft.Data.Sqlite` (`v9.0.2`).
  - Added [`Data/DbConnectionFactory.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Data/DbConnectionFactory.cs) (`IDbConnectionFactory`) for managing SQLite connections.
  - Added [`Data/DbInitializer.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Data/DbInitializer.cs) for automatic table creation on startup.
  - Implemented Dapper repositories: [`OrganizationDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/OrganizationDapperRepository.cs), [`ProjectDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/ProjectDapperRepository.cs), and [`TaskDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/TaskDapperRepository.cs).
  - Injected Dapper repositories into domain services ([`OrganizationService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/OrganizationService.cs), [`ProjectService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/ProjectService.cs), [`TaskService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/TaskService.cs)) via constructor Dependency Injection.
  - Registered all interfaces and implementations in [`Program.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Program.cs) using Scoped / Singleton lifetimes.
- **Verification**: `.NET` build verified clean (`dotnet build` exit code 0, 0 Warnings, 0 Errors).

## [2026-08-09] Glorified TODO Frontend Creation (`gtodo-app`)

### 1. `glorified-todo/gtodo-app` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`gtodo-app`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-app).
- **Features**:
  - Full implementation of Thermal Productivity System and Eisenhower Quadrant Matrix scoring (`computePriorityScore` & `getPriorityInfo`).
  - Signal-computed task lists (`signal`, `computed`), multi-column Kanban board (`BACKLOG`, `TODO`, `DOING`, `DONE`), drag-and-drop status transitions, and `localStorage` persistence (`gtodo_tasks_v1`).
  - Navigation header & sidebar (*My Orgs*, *My Day*, *LIFE BOARD*, *SPECIAL LIST V2*, *GLORIFIED TO DO*, *FINANCES*), Project Category filters (*G3*, *HOUSE*, *WORK*, *CORISCO*), "ADICIONAL FILTROS?" modal, and "DATE" / Priority sorting.
  - V2 sub-task exploration support inline on task cards and within task modal.
  - Dark/Light mode theme switching and Close-on-Scroll header compact interaction.
- **Identified Issue & Resolution**:
  - *Root Cause*: TS2367 error in [`TaskService.updateTask`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-app/src/app/services/task.service.ts#L259) due to TypeScript type narrowing after `if (updates.status === 'DONE')`.
  - *Resolution*: Simplified `else if` branch condition to `else if (updates.status)`.
- **Verification**: Angular build verified clean (`npx ng build` exit code 0).

## [2026-08-12] System Architecture Standardization & Submodule Topology

### 1. Naming Convention & Stack LTS Standardization
- **Pattern Enforced**: Standardized `{projectName}-{layer}-{technology}` taxonomy across all applications and child projects.
- **Technology Stack Policy**: Standardized baseline target to LTS versions (.NET 8.0/10.0 LTS, Angular v18+ LTS, PHP 8.2+ LTS). Avoid non-LTS stepping stones in production targets.

### 2. Multi-Repo Submodule Documentation Hierarchy
- **Top-Level Orchestration**: Updated [`docs/ARCHITECTURE.md`](file:///home/g3/Repos/g3labz/Lifeboard/docs/ARCHITECTURE.md) and [`AGENTS.md`](file:///home/g3/Repos/g3labz/Lifeboard/AGENTS.md) with complete system topology diagrams (ASCII & Mermaid), application boundaries, and submodule maps.
- **Application & Project Compliance**: Provisioned `docs/ARCHITECTURE.md` and `AGENTS.md` across all 4 domain application directories (`glorified-todo`, `Finances`, `housesheet`, `storeroom`) and their child projects (`gtodo-app`, `gtodo-be-net`, `gtodo-be-ts`, `gtodo-be-angular`, `finances-app`, `housesheet-app`, `storeroom-app`).

### 3. Root Legacy PHP Monolith Isolation
- **`lifeboard-multi-php/`**: Isolated legacy PHP dashboard files (`index.php`, `cabecalho.php`, `footer.php`, `rodape.php`, `conecta.php`, `css/`, `js/`, `fonts/`, `db_access/`, `Dockerfile`, `docker-compose.yml`) into a dedicated `lifeboard-multi-php/` directory, restoring the root `Lifeboard` repository strictly as an umbrella container.
- **Submodule Project Organization**: Moved legacy web files in `housesheet` and `storeroom` into `housesheet-multi-js/` and `storeroom-multi-js/` project folders with full `docs/ARCHITECTURE.md` and `AGENTS.md` compliance.

### 4. GitHub Organization Repositories Creation & Submodule Linking
- **`G3Labz` Organization Repositories**: Created and synchronized all GitHub repositories under `@G3Labz`: `lifeboard-multi-php`, `gtodo-app`, `gtodo-be-net`, `finances-app`, `finances-multi-js`, `housesheet-app`, `housesheet-multi-js`, `storeroom-app`, and `storeroom-multi-js`.
- **`gtodo-be-ts` Cleanup**: Removed deprecated `gtodo-be-ts` repository (`dead`) from `glorified-todo` submodules.
- **Git Submodules Linking**: Registered all child Angular SPA apps and `{projectName}-multi-{tech}` legacy web projects as Git submodules inside their father application repositories (`glorified-todo`, `Finances`, `housesheet`, `storeroom`, `Lifeboard`).
- **Automated Commits**: Staged and committed changes across all father repositories on branch `dev-agy`.

### 6. Submodule Structure & Naming Taxonomy Verification
- **Legacy Projects Taxonomy (`{projectName}-legacy`)**: Verified exact naming for legacy implementations:
  - `lifeboard-legacy` (Dashboard Monolith in root workspace)
  - `finances-legacy` (Legacy Web in `Finances/finances-legacy`)
  - `housesheet-legacy` (Legacy Web in `housesheet/housesheet-legacy`)
  - `storeroom-legacy` (Legacy Web in `storeroom/storeroom-legacy`)
- **Frontend SPA Taxonomy (`{projectName}-fe-angular`)**: Verified exact naming for Angular Standalone projects:
  - `gtodo-fe-angular`
  - `finances-fe-angular`
  - `housesheet-fe-angular`
  - `storeroom-fe-angular`
- **Backend Taxonomy (`{projectName}-be-{tech}`)**:
  - `gtodo-be-net` (.NET Web API)
### 7. Application Dependency Upgrade Verification
- **Angular Frontend Applications (`{projectName}-fe-angular`)**: Updated `package.json` across all Angular Standalone SPAs (`gtodo-fe-angular`, `finances-fe-angular`, `housesheet-fe-angular`, `storeroom-fe-angular`) to Angular `^22.0.0` and TypeScript `~7.0.0`.
- **.NET Backend (`gtodo-be-net`)**: Updated `gtodo-be-net.csproj` to `<TargetFramework>net10.0</TargetFramework>`.
- **Status**: All application configurations updated, pushed to GitHub remotes, committed on `dev-agy`, and verified working tree clean.

## [2026-08-15] Finances Frontend: Hardcoded Value Elimination & Decoupled Transaction Helper

### 1. Hardcoded Value Remediation
- **Finding**: `FinanceService` contained legacy hardcoded fallbacks and filter constants (`['Gabriel', 'Isys', 'Shared']`, `['Gabriel', 'Isys']`, `b.id !== 'Outros'`, `id !== 'Shared'`, `category === 'Save' || bucket === 'Poupança'`, and hardcoded `'Contas'`/`'Pix'` defaults in parcel generation).
- **Resolution**:
  - Replaced hardcoded tab literal unions with domain type `FinanceTab` across components and service.
  - Added `excludeFromMatrix` to `BucketDefinition`/`BucketDefinitionDto` and `isShared` to `ContributorDefinition`/`ContributorDto` with bidirectional mapping in `finance.mapper.ts`.
  - Filtered matrix dynamically via `!c.isShared` and `!b.excludeFromMatrix`.
  - Refactored `savingBucketsCorrelation` to dynamically correlate transactions matching saving bucket IDs rather than fixed category names.
  - Extracted transaction and multi-month installment generation into pure `TransactionHelper` (`src/app/core/helpers/transaction.helper.ts`), isolating creation logic and allowing dynamic default injection from repository metadata.

## [2026-09-02] Ecosystem-Wide Roadmap & Feature Control Specification

### 1. Specification of `docs/roadmap.md` Across All 14 Projects
- **Scope**: Created standardized `docs/roadmap.md` for every project across the 3 architectural tiers:
  1. **Umbrella Workspace**: `Lifeboard`
  2. **Monolith Dashboard**: `lifeboard-legacy`
  3. **Finances Domain**: `Finances`, `finances-fe-angular`, `finances-legacy`
  4. **Glorified Todo Domain**: `glorified-todo`, `gtodo-fe-angular`, `gtodo-be-net`
  5. **Housesheet Domain**: `housesheet`, `housesheet-fe-angular`, `housesheet-legacy`
  6. **Storeroom Domain**: `storeroom`, `storeroom-fe-angular`, `storeroom-legacy`
- **Standardized Document Architecture**:
  - Metadata & standard taxonomy `{projectName}-{layer}-{technology}`.
  - Vision & architectural scope within the Lifeboard ecosystem.
  - Feature Capabilities & Control Matrix with feature flag keys, lifecycle statuses (`Released`, `In Progress`, `Planned`, `Backlog`, `Deprecated`), and target versions.
  - Concrete release milestone plans (Current, Next, Upcoming, Production/Vision).
  - Empirical changelog linking completed work to version tags.
  - Feature control & configuration strategy (environment toggles, repository swapping, application configuration).
## [2026-09-21] Finances Frontend Multi-Stage Containerization & Routing

### 1. Multi-Stage Docker Architecture for Angular v22 SPA
- **Target**: `Finances/finances-fe-angular`
- **Builder Stage**:
  - Image: `node:22-alpine`
  - Utilizes `npm install --legacy-peer-deps` due to strict Angular v22 / TypeScript 7 peer-dependency resolution flags.
  - Angular build output compiles to `/app/dist/finances-app/browser` under `@angular-devkit/build-angular:application`.
- **Runtime Web Server Stage**:
  - Image: `nginx:1.27-alpine`
  - Static distribution copied to `/usr/share/nginx/html`.
  - Configured `nginx.conf` with:
    - HTML5 history pushState SPA routing via `try_files $uri $uri/ /index.html;`.
    - Long-term asset caching (`Cache-Control: public, max-age=31536000, immutable`).
    - Standard security headers (`X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, `server_tokens off;`).
    - Gzip compression for static assets.
- **Compose & Build Optimization**:
  - Configured `.dockerignore` to discard `node_modules`, `dist`, `.git`, `.angular`, and documentation files.
  - Synchronized `compose.yaml` and `compose.example.yaml` with service `container_name: finances-fe-angular`, port mapping `4201:80`, and restart policy `unless-stopped`.












