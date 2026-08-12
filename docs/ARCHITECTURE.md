# Lifeboard System Architecture & Topology

## 1. System Overview & Topology

Lifeboard is a modular ecosystem composed of an umbrella repository (`Lifeboard`), containing submoduled domain applications and child project repositories.

```
+-----------------------------------------------------------------------------------+
|                              Lifeboard Umbrella Repo                              |
|                              (Root: /home/g3/.../Lifeboard)                       |
|                                                                                   |
|  Legacy Architecture:                                                             |
|  - lifeboard-legacy (Root PHP Dashboard: index.php + cabecalho/rodape/css)        |
|                                                                                   |
|  Target Roadmap Architecture:                                                     |
|  - lifeboard-fe-angular (Shell Dashboard SPA)                                    |
|  - lifeboard-be-net (Core Gateway / API Service)                                  |
+-------------------+--------------------+--------------------+---------------------+
                    |                    |                    |
  +-----------------+--+       +---------+-------+      +-----+--------------+
  |     Finances       |       |    Storeroom    |      |    Housesheet      |
  |  (Application Repo)|       |  (Application Repo)|     |  (Application Repo)|
  |  - finances-fe-angular |     |  - storeroom-fe-angular|  |  - housesheet-fe-angular
  |  - finances-legacy |       |  - storeroom-legacy |    |  - housesheet-legacy|
  +--------------------+       +-----------------+      +--------------------+
                                         |
                       +-----------------+------------------+
                       |          Glorified Todo            |
                       |       (Application Repo)           |
                       |  - gtodo-fe-angular (SPA App)     |
                       |  - gtodo-be-net (.NET Web API)     |
                       +------------------------------------+
```

### Communication Topology (Mermaid)

```mermaid
graph TD
    subgraph Client Tier
        L_FE["lifeboard-fe-angular (Target Shell UI)"]
        L_PHP["lifeboard-legacy (Legacy PHP Monolith)"]
    end

    subgraph Domain Applications
        subgraph Finances App
            FIN_FE["finances-fe-angular (Finances SPA)"]
            FIN_LEG["finances-legacy (Legacy Web App)"]
        end

        subgraph Storeroom App
            STO_FE["storeroom-fe-angular (Storeroom SPA)"]
            STO_LEG["storeroom-legacy (Legacy Web App)"]
        end

        subgraph Housesheet App
            HOU_FE["housesheet-fe-angular (Housesheet SPA)"]
            HOU_LEG["housesheet-legacy (Legacy Web App)"]
        end

        subgraph Glorified Todo App
            GT_FE["gtodo-fe-angular (Todo SPA)"]
            GT_BENET["gtodo-be-net (.NET Web API)"]
        end
    end

    subgraph Data & Storage
        SQLITE_GT[("SQLite Database (glorifiedtodo.db)")]
        LOCAL_STORAGE[("Browser LocalStorage")]
    end

    L_PHP -->|Embedded Frames / Nav| FIN_FE
    L_PHP -->|Embedded Frames / Nav| STO_FE
    L_PHP -->|Embedded Frames / Nav| HOU_FE
    L_PHP -->|Embedded Frames / Nav| GT_FE

    L_FE -->|REST API Calls| L_BENET["lifeboard-be-net (Future Gateway API)"]
    
    GT_FE -->|HTTP / REST API| GT_BENET
    GT_FE -->|State Sync| LOCAL_STORAGE
    FIN_FE -->|State Sync| LOCAL_STORAGE
    STO_FE -->|State Sync| LOCAL_STORAGE
    HOU_FE -->|State Sync| LOCAL_STORAGE

    GT_BENET -->|Dapper ORM / SQL| SQLITE_GT
```

---

## 2. Naming Conventions & Project Structures

All projects within the `Lifeboard` ecosystem follow the standardized naming taxonomy:

$$\text{\{projectName\}-\{layer\}-\{technology\}}$$

### Legacy Project Naming Rule
All legacy applications are strictly named as:

$$\text{\{projectName\}-legacy}$$

- `lifeboard-legacy` (Legacy PHP dashboard monolith)
- `finances-legacy` (Legacy web implementation)
- `housesheet-legacy` (Legacy web implementation)
- `storeroom-legacy` (Legacy web implementation)

### Taxonomy Matrix

| Field | Definition | Options / Allowed Values | Examples |
| :--- | :--- | :--- | :--- |
| **`projectName`** | Name of the domain application or module (shortened if standard). | `lifeboard`, `gtodo`, `finances`, `housesheet`, `storeroom` | `gtodo`, `lifeboard` |
| **`layer`** | Architectural tier of the specific project. | `fe` (frontend), `be` (backend), `infra` (infrastructure), `legacy` (legacy monolith/web) | `fe`, `be`, `legacy` |
| **`technology`** | Primary framework, language, or platform used. | `angular`, `net`, `ts`, `php`, `js`, `docker`, `terraform` | `angular`, `net`, `php` |

### Existing & Target Project Mapping

- **Umbrella Repository**: `Lifeboard` (Root)
- **Root Legacy Monolith**: `lifeboard-legacy`
- **Root Future Shell**: `lifeboard-fe-angular`, `lifeboard-be-net`
- **Glorified Todo Domain**:
  - `glorified-todo/gtodo-fe-angular` $\rightarrow$ `gtodo-fe-angular`
  - `glorified-todo/gtodo-be-net` $\rightarrow$ `gtodo-be-net` (`.Application`, `.Tests`)
- **Finances Domain**:
  - `Finances/finances-fe-angular` $\rightarrow$ `finances-fe-angular`
  - `Finances/finances-legacy` $\rightarrow$ `finances-legacy`
- **Housesheet Domain**:
  - `housesheet/housesheet-fe-angular` $\rightarrow$ `housesheet-fe-angular`
  - `housesheet/housesheet-legacy` $\rightarrow$ `housesheet-legacy`
- **Storeroom Domain**:
  - `storeroom/storeroom-fe-angular` $\rightarrow$ `storeroom-fe-angular`
  - `storeroom/storeroom-legacy` $\rightarrow$ `storeroom-legacy`

---

## 3. Multi-Repo & Submodule Hierarchy

```
Level 0: Umbrella Repository (Lifeboard)
 │
 ├── Level 1: Monolith Repository (lifeboard-legacy)
 │
 ├── Level 1: Application Submodule (glorified-todo)
 │    ├── Level 2: Project Submodule (gtodo-fe-angular)
 │    └── Level 2: Project Submodule (gtodo-be-net)
 │
 ├── Level 1: Application Submodule (Finances)
 │    ├── Level 2: Project Submodule (finances-fe-angular)
 │    └── Level 2: Project Submodule (finances-legacy)
 │
 ├── Level 1: Application Submodule (housesheet)
 │    ├── Level 2: Project Submodule (housesheet-fe-angular)
 │    └── Level 2: Project Submodule (housesheet-legacy)
 │
 └── Level 1: Application Submodule (storeroom)
      ├── Level 2: Project Submodule (storeroom-fe-angular)
      └── Level 2: Project Submodule (storeroom-legacy)
```

---

## 4. Technology Stack LTS Versioning Policy

- **.NET**: Active LTS only (.NET 8.0 LTS or nearest upcoming LTS .NET 10.0). Standard Term Support (STS) versions (such as .NET 9.0) are migration stepping stones.
- **Angular**: Active LTS releases (Angular v18+ LTS).
- **PHP**: Active LTS releases (PHP 8.2 / 8.3 LTS).
- **TypeScript**: TS 5.x+ targeting ES2022 / ESNext standards.
- **Database / ORM**: SQLite (`Microsoft.Data.Sqlite`) with Dapper ORM (`v2.x`).

---

## 5. Agent & Submodule Operational Rules

1. **Submodule Repository Directives**: All code modifications, builds, and test runs MUST be performed directly inside the child submodule project repositories.
2. **Automated Commit Authorization**: On branch `dev/agy` (or `dev-agy`), AI agents are authorized to commit changes automatically.
