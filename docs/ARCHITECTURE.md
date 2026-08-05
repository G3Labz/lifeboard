# Lifeboard System Architecture

## Architecture Overview

Lifeboard is a modular dashboard application integrating specialized services into a unified interface.

```
+-------------------------------------------------------------------+
|                        Lifeboard Dashboard                        |
|                            (index.php)                            |
+-------------------+--------------------+--------------------------+
                    |                    |
  +-----------------+--+       +---------+-------+      +-----------+--------+
  |     Finances       |       |    Storeroom    |      |    Housesheet      |
  |  (Angular App)     |       |  (Angular App)  |      |  (Angular App)     |
  +--------------------+       +-----------------+      +--------------------+
                                                         
  +--------------------------------------------------------------------------+
  |                            Glorified Todo                                |
  |                         .NET 9 Web API Service                           |
  |                    (Dapper ORM + SQLite Database)                        |
  +--------------------------------------------------------------------------+
```

## Frontends (Angular Standalone Applications)

All frontends utilize **Angular 17+ Standalone Components** with **Angular Signals** (`signal`, `computed`), `CommonModule`, `FormsModule`, and persistent state management via browser `localStorage`.

### 1. Finances (`Finances/finances-app`)
- **Location**: [`Finances/finances-app`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-app)
- **Component**: [`AppComponent`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-app/src/app/app.component.ts)
- **Features**:
  - Time-of-day dynamic greeting (`Good Morning`, `Good Afternoon`, `Good Evening`, `Good Night`).
  - Signal-computed total balance with sentiment emojis (`🚀` for positive, `👎` for negative balance).
  - Categorized color indicator (`IN 🟢` vs `OUT 🔴`).
  - Transaction quick add, inline edit prompt, deletion, and local storage state sync.

### 2. Storeroom (`storeroom/storeroom-app`)
- **Location**: [`storeroom/storeroom-app`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-app)
- **Component**: [`AppComponent`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-app/src/app/app.component.ts)
- **Features**:
  - Dual inventory tracking: Current Inventory (`Have`) and Shopping List (`Buy`).
  - `markAsBought()` method to seamlessly migrate purchased items from shopping list into active inventory.
  - Item addition, edit, deletion, bulk clearing, and `localStorage` persistence.

### 3. Housesheet (`housesheet/housesheet-app`)
- **Location**: [`housesheet/housesheet-app`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-app)
- **Component**: [`AppComponent`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-app/src/app/app.component.ts)
- **Features**:
  - Household activity and chore logger.
  - Category tags (`Chore 🧹`, `Maintenance 🔧`, `Bill 💳`, `Wanderer Log 🎒`).
  - One-click status toggling (`Pending ⏳` / `Completed ✅`).

---

## Backend (.NET 9 Web API & Dapper ORM)

### Architecture Stack
- **Framework**: .NET 9 Web API (`Microsoft.NET.Sdk.Web`).
- **ORM Layer**: **Dapper** (`v2.1.35`).
- **Database**: SQLite (`Microsoft.Data.Sqlite` `v9.0.2`).
- **Design Pattern**: Controller-Service-Repository Pattern with Constructor Dependency Injection (DI).

### Data Flow & Component Mapping
1. **HTTP Requests**: Handled by Controllers (`OrganizationsController`, `ProjectsController`, `TasksController`).
2. **Business Services**: Domain services (`OrganizationService`, `ProjectService`, `TaskService`) injected with repository interfaces.
3. **Dapper Repositories**: Data access repositories (`OrganizationDapperRepository`, `ProjectDapperRepository`, `TaskDapperRepository`) executing parameterized SQL queries via `IDbConnectionFactory`.
4. **Database Initializer**: `DbInitializer` runs Dapper DDL statements automatically on startup.

### Relational Schema (SQLite)

```sql
CREATE TABLE IF NOT EXISTS Organizations (
    Id TEXT PRIMARY KEY,
    Name TEXT NOT NULL,
    Description TEXT,
    CreatedAt TEXT NOT NULL,
    UpdatedAt TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Projects (
    Id TEXT PRIMARY KEY,
    Name TEXT NOT NULL,
    Description TEXT,
    OrganizationId TEXT NOT NULL,
    CreatedAt TEXT NOT NULL,
    UpdatedAt TEXT NOT NULL,
    FOREIGN KEY (OrganizationId) REFERENCES Organizations(Id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Tasks (
    Id TEXT PRIMARY KEY,
    Title TEXT NOT NULL,
    Description TEXT,
    Completed INTEGER NOT NULL DEFAULT 0,
    ProjectId TEXT NOT NULL,
    DueDate TEXT,
    CreatedAt TEXT NOT NULL,
    UpdatedAt TEXT NOT NULL,
    FOREIGN KEY (ProjectId) REFERENCES Projects(Id) ON DELETE CASCADE
);
```
