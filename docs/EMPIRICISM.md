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

### 4. GitHub Organization Repositories Creation & Submodule Registration
- **`G3Labz` Organization Repositories**: Created 10 private GitHub repositories under `@G3Labz` using `gh` CLI: `lifeboard-multi-php`, `gtodo-app`, `gtodo-be-net`, `gtodo-be-angular`, `finances-app`, `finances-fe-js`, `housesheet-app`, `housesheet-multi-js`, `storeroom-app`, and `storeroom-multi-js`.
- **Git Submodules Linking**: Initialized local repositories, committed initial code, pushed to `G3Labz` GitHub remotes, and registered all child projects as Git submodules inside their father application repositories.
- **Automated Commits**: All changes staged and committed automatically on branch `dev-agy`.




